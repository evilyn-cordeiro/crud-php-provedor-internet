<?php

// Classe para representar um cliente
class Cliente {
    private $id;
    private $nome;
    private $email;

    public function __construct($id, $nome, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }
}

// Classe para representar um plano de internet
class PlanoInternet {
    private $id;
    private $nome;
    private $velocidade;
    private $preco;

    public function __construct($id, $nome, $velocidade, $preco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->velocidade = $velocidade;
        $this->preco = $preco;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getVelocidade() {
        return $this->velocidade;
    }

    public function getPreco() {
        return $this->preco;
    }
}

// Classe para representar uma venda de plano de internet
class VendaPlanoInternet {
    private $id;
    private $cliente;
    private $plano;
    private $data;

    public function __construct($id, $cliente, $plano, $data) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->plano = $plano;
        $this->data = $data;
    }

    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getPlano() {
        return $this->plano;
    }

    public function getData() {
        return $this->data;
    }
}


// Exemplo de uso das classes
$cliente = new Cliente(1, "João", "joao@example.com");
$plano = new PlanoInternet(1, "Plano Básico", "10 Mbps", 50.00);
$venda = new VendaPlanoInternet(1, $cliente, $plano, date("d-m-Y"));

echo "Cliente: " . $venda->getCliente()->getNome() . "\n";
echo "Plano: " . $venda->getPlano()->getNome() . " - Velocidade: " . $venda->getPlano()->getVelocidade() . "\n";
echo "Data da Venda: " . $venda->getData() . "\n";
echo"------------------------------------------ \n";
$cliente = new Cliente(2, "Camila", "camila@example.com");
$plano = new PlanoInternet(2, "Plano Intermediário", "50 Mbps", 70.00);
$venda = new VendaPlanoInternet(2, $cliente, $plano, date("d-m-Y"));

echo "Cliente: " . $venda->getCliente()->getNome() . "\n";
echo "Plano: " . $venda->getPlano()->getNome() . " - Velocidade: " . $venda->getPlano()->getVelocidade() . "\n";
echo "Data da Venda: " . $venda->getData() . "\n";

?>
