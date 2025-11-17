<?php
class Empleado {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos=[]; // = array();

    // Setters
    public function setNombre(string $n) {
        $this->nombre = $n;
    }
    public function setApellidos(string $a) {
        $this->apellidos = $a;
    }
    public function setSueldo(float $s) {
        $this->sueldo = $s;
    }

    // Getters
    public function getNombre(): string {
        return $this->nombre;
    }
    public function getApellidos(): string {
        return $this->apellidos;
    }
    public function getSueldo(): float {
        return $this->sueldo;
    }

    // Otros métodos
    public function getNombreCompleto() :string {
        return $this->nombre." ".$this->apellidos;
    }

    // Comprueba si debe pagar impuestos
    public function debePagarImpuestos(): bool {
        return (($this->sueldo > 3333)?true:false);
    }

    // Añadimos un teléfono 
    public function anyadirTelefono(int $telefono) : void {
        array_push($this->telefonos,$telefono); // $this->telefonos[] = $telefono;
    }

    // DEvolvemos una cadena con todos los teléfonos separados por comas
    public function listarTelefonos(): string {
        return (implode(', ',$this->telefonos));
    }

    // Vaciamos el array de teléfonos
    public function vaciarTelefonos(): void {
        $this->telefonos = [];
    }
}

$emple1 = new Empleado();
$emple1->setNombre("Alicia");
$emple1->setApellidos("Ramírez Ochoa");
$emple1->setSueldo(4300.0);
echo "La empleada ".$emple1->getNombre()." se apellida ".$emple1->getApellidos()." y cobra ".$emple1->getSueldo()."€<br>";
echo "Su nombre completo es:".$emple1->getNombreCompleto()."<br>";

if ($emple1->debePagarImpuestos()){
    echo "<h2>DEBE PAGAR IMPUESTOS</h2>";
}
else {
    echo "<h2>NO DEBE PAGAR IMPUESTOS</h2>";
}

$emple1->anyadirTelefono(665667665);
$emple1->anyadirTelefono(665444665);
$emple1->anyadirTelefono(665333365);

echo "Teléfonos: ".$emple1->listarTelefonos()."<br>";

$emple1->vaciarTelefonos();

echo "Teléfonos: ".$emple1->listarTelefonos()."<br>";


?>