<?php

require_once 'conexion.php';
require_once 'config.php';

class Persona {
    private $nombre;
    private $apellido;
    private $email;
    private $fecha_nacimiento;
    private $telefono;
    private $genero;
    private $pais;

    public function __construct($nombre, $apellido, $email, $fecha_nacimiento, $telefono, $genero, $pais)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->telefono = $telefono;
        $this->genero = $genero;
        $this->pais = $pais;
    }

    // Función para insertar una nueva persona en la base de datos
    public function insertar()
    {
        $pdo=Conexion::getPDOConnection();

        $sql = "INSERT INTO Personas (nombre, apellido, email, fecha_nacimiento, telefono, genero, pais) VALUES (:nombre, :apellido, :email, :fecha, :telefono, :genero, :pais)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':pais', $this->pais);

    }


    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre): self{
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido): self{
        $this->apellido = $apellido;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email): self{
        $this->email = $email;
        return $this;
    }

    public function getfecha_nacimiento(){
        return $this->fecha_nacimiento;
    }

    public function setfecha_nacimiento($fecha_nacimiento): self{
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono): self{
        $this->telefono = $telefono;
        return $this;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero): self{
        $this->genero = $genero;
        return $this;
    }

    public function getPais(){
        return $this->pais;
    }

    public function setPais($pais): self{
        $this->pais = $pais;
        return $this;
    }
}
