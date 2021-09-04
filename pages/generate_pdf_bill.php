<?php
require('./fpdf184/fpdf.php');
include("../helper/connect.php");
session_start();
if(isset($_SESSION['user_login_check'])) {
?>
<p style="color: purple;  font-size: 20px;">Welcome, <?php echo  $_SESSION['user_login_check']; ?>!</p>
<?php
}
$user_id=$_SESSION['id'];
    class pdf extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial", "B", 15);
            //$this->image("",10,10,10);
            $this->Cell(0, 7, "What You See Is What You Get", 0, 1, "C");
            $this->Cell(5,10);
            $this->SetFont("Arial", "", 10);
            $this->Cell(0, 7, "Basundhara Chowk, Kathmandu, Nepal : ", 0, 1, "C");
            $this->Cell(5,10);
            $this->Cell(0, 7, "Phone: 9869260495 || Email: contact@wysiwyg.com", 0, 1, "C");
            $this->Cell(5,10);
            $this->Cell(0, 7, "www.wysiwyg.com.np", 0, 1, "C");
            $this->Cell(120);
            //dummpy cell to line spacing
            $this->Ln(7);
            //dummy cell to put logo
            $this->Cell(12);
            $this->SetFont("Arial", "B", 22);
            $this->Cell(0, 7, "Customer Bill", 0, 1, "C");
            $this->Ln(7);
        }
        function Footer()
        {
            $this->SetY(-20);
            $this->SetFont("Arial", "", 8);
            $this->Cell(0, 7, "Note: This is a pdf copy of computer generated invoice.", 0, 1, "C");
        }
    }
   $sql = "SELECT * FROM cart WHERE user_id=$user_id and status='confirmed'  ";
   echo $sql;
   $total_price = 0;
   $count=0;
   $response = $conn->query($sql);
         ob_start();
         $pdf = new PDF();
         $pdf->AddPage();
         $pdf->SetFont('Arial', 'B', 12);
         $pdf->Cell(30, 7, 'S.N.', 1, 0, 'C');
         $pdf->Cell(30, 7, 'ID', 1, 0, 'C');
         $pdf->Cell(30, 7, 'Name', 1, 0, 'C');
         $pdf->Cell(30, 7, 'Quantity', 1, 0, 'C');
         $pdf->Cell(30, 7, 'Price', 1, 0, 'C');
         $pdf->Cell(30, 7, 'Sub Total', 1, 1, 'C');
         $pdf->SetFont('Arial', 'B', 12);
   if($response->num_rows>0){
      while($row=$response->fetch_assoc()){
         $count++;
         $pdf->Cell(30, 7, $count, 1, 0, 'C');
         $pdf->Cell(30, 7, $row['product_id'], 1, 0, 'C');
         $pdf->Cell(30, 7, $row['product_name'], 1, 0, 'C');
         $pdf->Cell(30, 7, $row['product_quantity'], 1, 0, 'C');
         $pdf->Cell(30, 7, $row['price'] / $row['product_quantity'], 1, 0, 'C');
         $pdf->Cell(30, 7, $row['price'], 1, 1, 'C');
         $pdf->SetFont('Arial', 'B', 12);
         $total_price = $total_price+ $row['price'];
      }
   }
         $pdf->SetFont('Arial', 'B', 12);
         $pdf->Cell(200,25,"",0,1);
         $pdf->Cell(190,25, "============Payable Amount============",0,1,'C');
         $pdf->Cell(200,8,"",0,1);
         $pdf->Cell(60,7,"Total Amount",1,0,'C');
         $pdf->Cell(30,7,$total_price,1,1,"C");
         $pdf->Cell(60,7,"VAT Amount (13%)",1,0,'C');
         $pdf->Cell(30,7,($total_price*0.13),1,1,"C");
         $pdf->Cell(60,7,"Grand Total Amount",1,0,'C');
         $pdf->Cell(30,7,($total_price + (0.13*$total_price)),1,1,"C");
         $pdf->SetFont('Arial', 'B', 12);
         $pdf->Cell(200,25,"",0,1);
         $pdf->Cell(190,25, "============Thank you for using our service!!!============",0,1,'C');
         $pdf->Cell(200,8,"",0,1);


      $rewrite = "UPDATE cart SET status='ordered' WHERE user_id=$user_id and status='confirmed' ";
      $response = $conn->query($rewrite);
      if($conn->query($rewrite)==TRUE){  
      // header("Location: cart.php");
      }
        $pdf->Output();
        ob_end_flush();
   //  }
    ?>
</body>

</html>