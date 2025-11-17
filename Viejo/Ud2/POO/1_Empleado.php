<?php
class Empleado
{
    public string $nombre;
    public string $apellidos;
    public float $sueldo;

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setNombre($nombre)
    {
        return $this->nombre = $nombre;
    }
    public function setApellidos($apellidos)
    {
        return $this->apellidos = $apellidos;
    }
    public function setSueldo($sueldo)
    {
        return $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string
    {
        $nombreCompleto = $this->nombre . $this->apellidos;
        return $nombreCompleto;
    }
    public function debePagarImpuestos(): bool{
        return (($this->sueldo > 3333)? True : False);
    }
}

$empleado = new Empleado();
$empleado->setNombre("Raúl ");
$empleado->setApellidos("Sandoval López");
$empleado->setSueldo(4000);
$nombreCompleto = $empleado->getNombreCompleto();
echo $nombreCompleto;
if($empleado->debePagarImpuestos()){
    echo "</br>Debe pagar impuestos";
}else{
    echo "</br>Está exento de pagar impuestos";
}