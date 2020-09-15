<?php


class AnioBean {
    
    public $anio_escolar_id;
      public $fecha_inicio;
        public $fecha_fin;
        public $estado;
        
        function getAnio_escolar_id() {
            return $this->anio_escolar_id;
        }

        function getFecha_inicio() {
            return $this->fecha_inicio;
        }

        function getFecha_fin() {
            return $this->fecha_fin;
        }

        function getEstado() {
            return $this->estado;
        }

        function setAnio_escolar_id($anio_escolar_id) {
            $this->anio_escolar_id = $anio_escolar_id;
        }

        function setFecha_inicio($fecha_inicio) {
            $this->fecha_inicio = $fecha_inicio;
        }

        function setFecha_fin($fecha_fin) {
            $this->fecha_fin = $fecha_fin;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }



}
