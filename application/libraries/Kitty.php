<?php
    /**
     *
     */
    class Kitty
    {
        protected $CI;
        protected $n = 1;
        // Total jumlah penyakit
        protected $total = 0;
        protected $p = 0;
        protected $m = 0;
        protected $nc = [];
        // Gejala yang dipilih
        protected $cur = [];
        // Daftar semua penyakit
        protected $penyakit = [];
        // Daftar semua gejala penyakit
        protected $all_gejala = [];

        function __construct()
        {
            $this->CI =& get_instance();
        }

        public function initialize( $params = array() ) {
            foreach ($params as $key => $val) {
    			if (property_exists($this, $key)) {
    				$this->$key = $val;
    			}
    		}
            if ($this->total) {
                $this->p = $this->n / $this->total;
            }
        }

        public function count() {
            if (!$this->penyakit || !$this->all_gejala || !$this->cur){
                return [];
            }
            $result = [];
            foreach ($this->penyakit as $penyakit) {

                // Menentukan nilai nc
                foreach ($this->cur as $gejala) {
                    foreach ($this->all_gejala as $daftar_gejala) {
                        if ((int)$penyakit->id_penyakit === (int)$daftar_gejala->id_penyakit) {
                            if ((int)$gejala->id_gejala === (int)$daftar_gejala->id_gejala) {
                                $nc[$penyakit->id_penyakit][$gejala->id_gejala] = 1;
                                continue 2;
                            } else {
                                $nc[$penyakit->id_penyakit][$gejala->id_gejala] = 0;
                            }
                        }
                    }
                }

                // Menghitung nilai P
                $pT = [];
                foreach ($nc[$penyakit->id_penyakit] as $key => $value) {
                    $hasil = ($value + $this->m * $this->p) / ($this->m + $this->n);
                    $pT[] = round( $hasil , 3);
                }

                // Menghitung V
                $total_pT = $pT[0];
                for ($i=1; $i < count($pT); $i++) {
                    $total_pT *= $pT[$i];
                }
                $result[$penyakit->id_penyakit] = $this->p * $total_pT;
            }

            return $result;
        }
    }

?>
