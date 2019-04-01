<?php
    class ProductosDTO
    {
        private $idProducto;
        private $nombre;
        private $precio;
        private $cantidad;
        private $proveedor; 

        public function setIdProducto($id)
        {
            $this->idProducto = $id;
        }

        public function getIdProducto()
        {
            return $this->idProducto;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setPrecio($precio)
        {
            $this->precio = $precio;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function setProveedor($unProveedor)
        {
            $this->proveedor = $unProveedor;
        }

        public function getProveedor()
        {
            return $this->proveedor;
        }

    }

?>
