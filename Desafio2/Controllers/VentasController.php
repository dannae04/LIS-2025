<?php 
require_once 'Controller.php';
require_once 'Models/VentasModel.php';
require_once __DIR__ . '/../libs/fpdf.php';

class VentasController extends Controller{

    private $model;
    function __construct(){
        if(empty($_SESSION['rol']) || !empty($_SESSION['nombre'])){
            header('location:'.PATH.'/Principal/index');
        }
        $this->model=new VentasModel(); //inicializa la clase ModalVentas
    }

    //funcion para mostrar las ventas
    public function index(){
        $viewBag=[];
        $viewBag['ventas']=$this->model->get();
        $this->render("ventas.php",$viewBag);
    }

    //funcion para eliminar una venta
    public function eliminar($params){
        $id=$params[0];
        $this->model->delete($id);
        header('location:'.PATH.'/Ventas/index');
    }
    
    //funcion para generar un PDF
    public function generarPDF($params){
     
    
        $idVenta = $params[0];
        $venta = $this->model->getById($idVenta);
        $detalles = $this->model->getDetalleVenta($idVenta);
    
        if(!$venta){
            die("Venta no encontrada");
        }
    
        $pdf = new FPDF(); // Instancia de la clase FPDF
        $pdf->AddPage(); // Añadir una página
        $pdf->SetFont('Arial','B',16); 
        $pdf->Cell(0,10,'Factura de Compra',0,1,'C'); //genera un texto centrado
        $pdf->Cell(0,10,'Tienda Textil Export',0,1,'C'); //genera un texto centrado
        $pdf->Ln(10);
    
        // Datos generales
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,10,'ID Venta: '.$venta['id'],0,1);
        $pdf->Cell(0,10,'Cliente: '.$venta['cliente'],0,1);
        $pdf->Cell(0,10,'Fecha: '.$venta['fecha'],0,1);
        $pdf->Ln(5);
    
        // Tabla de productos
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,'Producto',1);
        $pdf->Cell(30,10,'Cantidad',1);
        $pdf->Cell(40,10,'Precio',1);
        $pdf->Cell(40,10,'Subtotal',1);
        $pdf->Ln();
    
        $pdf->SetFont('Arial','',12);
        $total = 0;
        foreach($detalles as $detalle){
            $subtotal = $detalle['cantidad'] * $detalle['precio'];
            $total += $subtotal;
            $pdf->Cell(80,10,$detalle['nombre'],1);
            $pdf->Cell(30,10,$detalle['cantidad'],1);
            $pdf->Cell(40,10,'$'.$detalle['precio'],1);
            $pdf->Cell(40,10,'$'.$subtotal,1);
            $pdf->Ln();
        }
    
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(150,10,'Total:',1);
        $pdf->Cell(40,10,'$'.$total,1);
        $pdf->Output();
    }
    

}

?>