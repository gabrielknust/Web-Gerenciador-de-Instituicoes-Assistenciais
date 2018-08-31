<?php
require_once 'acesso.php';
require_once 'Pessoa.php';
include_once 'Conexao.php';

class Funcionario extends Pessoa
{

    private $id_funcionario;
    private $id_pessoa;
    private $id_quadro_horario;
    private $vale_transporte;
    private $data_admissao;
    private $pis;
    private $ctps;
    private $uf_ctps;
    private $numero_titulo;
    private $zona;
    private $secao;
    private $certificado_reservista_numero;
    private $certificado_reservista_serie;
    private $calcado;
    private $calca;
    private $jaleco;
    private $camisa;
    private $usa_vtp;
    private $cesta_basica;
    private $situacao;

    public function __construct($vale_transporte,$data_admissao,$pis,$ctps,$uf_ctps,$numero_titulo,$zona,$secao,$certificado_reservista_numero,$certificado_reservista_serie,$calcado,$calca,$jaleco,$camisa,$usa_vtp,$cesta_basica,$situacao,$cpf,$senha,$nome,$sexo,$telefone,$data_nascimento,$imagem,$cep,$cidade,$bairro,$logradouro,$numero_endereco,$complemento,$registro_geral,$orgao_emissor,$data_expedicao,$nome_mae,$nome_pai,$tipo_sanguineo)
    {
        $this->vale_transporte=$vale_transporte;
        $this->data_admissao=$data_admissao;
        $this->pis=$pis;
        $this->ctps=$ctps;
        $this->uf_ctps=$uf_ctps;
        $this->numero_titulo=$numero_titulo;
        $this->zona=$zona;
        $this->secao=$secao;
        $this->certificado_reservista_numero=$certificado_reservista_numero;
        $this->certificado_reservista_serie=$certificado_reservista_serie;
        $this->calcado=$calcado;
        $this->calca=$calca;
        $this->jaleco=$jaleco;
        $this->camisa=$camisa;
        $this->usa_vtp=$usa_vtp;
        $this->cesta_basica=$cesta_basica;
        $this->situacao=$situacao;
        $this->cpf=$cpf;
        $this->senha=$senha;
        $this->nome=$nome;
        $this->sexo=$sexo;
        $this->telefone=$telefone;
        $this->data_nascimento=$data_nascimento;
        $this->imagem=$imagem;
        $this->cep=$cep;
        $this->cidade=$cidade;
        $this->bairro=$bairro;
        $this->logradouro=$logradouro;
        $this->numero_endereco=$numero_endereco;
        $this->complemento=$complemento;
        $this->registro_geral=$registro_geral;
        $this->orgao_emissor=$orgao_emissor;
        $this->data_expedicao=$data_expedicao;
        $this->nome_mae=$nome_mae;
        $this->nome_pai=$nome_pai;
        $this->tipo_sanguineo=$tipo_sanguineo;
        $this->ibge=$ibge;
    }
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }

    public function getId_quadro_horario()
    {
        return $this->id_quadro_horario;
    }

    public function getVale_transporte()
    {
        return $this->vale_transporte;
    }

    public function getData_admissao()
    {
        return $this->data_admissao;
    }

    public function getPis()
    {
        return $this->pis;
    }

    public function getCtps()
    {
        return $this->ctps;
    }

    public function getUf_ctps()
    {
        return $this->uf_ctps;
    }

    public function getNumero_titulo()
    {
        return $this->numero_titulo;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getSecao()
    {
        return $this->secao;
    }

    public function getCertificado_reservista_numero()
    {
        return $this->certificado_reservista_numero;
    }

    public function getCertificado_reservista_serie()
    {
        return $this->certificado_reservista_serie;
    }

    public function getCalcado()
    {
        return $this->calcado;
    }

    public function getCalca()
    {
        return $this->calca;
    }

    public function getJaleco()
    {
        return $this->jaleco;
    }

    public function getCamisa()
    {
        return $this->camisa;
    }

    public function getUsa_vtp()
    {
        return $this->usa_vtp;
    }

    public function getCesta_basica()
    {
        return $this->cesta_basica;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function getQuadro_horario()
    {
        return $this->quadro_horario;
    }

    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;
    }

    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function setId_quadro_horario($id_quadro_horario)
    {
        $this->id_quadro_horario = $id_quadro_horario;
    }

    public function setVale_transporte($vale_transporte)
    {
        $this->vale_transporte = $vale_transporte;
    }

    public function setData_admissao($data_admissao)
    {
        $this->data_admissao = $data_admissao;
    }

    public function setPis($pis)
    {
        $this->pis = $pis;
    }

    public function setCtps($ctps)
    {
        $this->ctps = $ctps;
    }

    public function setUf_ctps($uf_ctps)
    {
        $this->uf_ctps = $uf_ctps;
    }

    public function setNumero_titulo($numero_titulo)
    {
        $this->numero_titulo = $numero_titulo;
    }

    public function setZona($zona)
    {
        $this->zona = $zona;
    }

    public function setSecao($secao)
    {
        $this->secao = $secao;
    }

    public function setCertificado_reservista_numero($certificado_reservista_numero)
    {
        $this->certificado_reservista_numero = $certificado_reservista_numero;
    }

    public function setCertificado_reservista_serie($certificado_reservista_serie)
    {
        $this->certificado_reservista_serie = $certificado_reservista_serie;
    }

    public function setCalcado($calcado)
    {
        $this->calcado = $calcado;
    }

    public function setCalca($calca)
    {
        $this->calca = $calca;
    }

    public function setJaleco($jaleco)
    {
        $this->jaleco = $jaleco;
    }

    public function setCamisa($camisa)
    {
        $this->camisa = $camisa;
    }

    public function setUsa_vtp($usa_vtp)
    {
        $this->usa_vtp = $usa_vtp;
    }

    public function setCesta_basica($cesta_basica)
    {
        $this->cesta_basica = $cesta_basica;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function setQuadro_horario($quadro_horario)
    {
        $this->quadro_horario = $quadro_horario;
    }
}