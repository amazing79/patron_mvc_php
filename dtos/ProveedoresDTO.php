<?php
class ProveedoresDTO
    {
        private $idProveedor;
        private $nombre_proveedor;
        private $mail_contacto;

        public function setIdProveedor($id)
        {
            $this->idProveedor = $id;
        }

        public function getIdProveedor()
        {
            return $this->idProveedor;
        }

        public function setNombreProveedor($nombre)
        {
            $this->nombre_proveedor = $nombre;
        }

        public function getNombreProveedor()
        {
            return $this->nombre_proveedor;
        }

        public function setMailContacto($mail)
        {
            $this->mail_contacto = $mail;
        }

        public function getMailContacto()
        {
            return $this->mail_contacto;
        }
    }

?>
