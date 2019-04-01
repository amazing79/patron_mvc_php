<?php
    class ClientesDTO
    {
        private $idCliente;
        private $apellido;
        private $nombre;
        private $dni;
        private $fecha_nacimiento;

        public function setIdCliente($id)
        {
            $this->idCliente = $id;
        }

        public function getIdCliente()
        {
            return $this->idCliente;
        }

        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setDni($dni)
        {
            $this->dni = $dni;
        }

        public function getDni()
        {
            return $this->dni;
        }

        public function setFechaNacimiento($fecha_nacimiento)
        {
            $this->fecha_nacimiento = strtotime($fecha_nacimiento);
        }

        public function getFechaNacimiento()
        {
            return $this->fecha_nacimiento;
        }

        public function getFechaNacimientoPantalla()
        {
            return date('dd/mm/YYYY', $this->fecha_nacimiento);
        }

    }

?>
