<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
    </head>
    <style>
        .innerright,label {
    font-weight:bold;
}
body{
    background-image: url('image/e.jpg');
    background-repeat:no-repeat ;
    background-size:cover ;
}

.innerdiv {
    text-align: center;
    margin: 100px;
}
input{
    margin-left:20px;
    margin: 20px;
    padding: 10px12px;
    border-radius: 12px;
    
}
.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: transparent;
}

.greenbtn {
    background-color: transparent;

    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: large;
    border-radius: 10px;
}

th{
    background-color:transparent;
    color: black;
}
td{
    background-color: transparent;
    color: black;
}
td, a{
    color:black;
}
h1 {
    font-size: 75px;
    color:indigo;
    font-family: "Lucida Console", "Courier New", monospace;
}

label {
    display: inline-block;
    width: 240px;
    text-align: right;
    font-family: 'Courier New', Courier, monospace;
}

.btn {
    border-radius: 12px;
    padding: 8px 10px 8px 10px;
  }

 p {

    width: 240px;
    text-align: left;
    font-family: 'Courier New', Courier, monospace;
    margin-left: 140px;
 }

  .alert {
     font-family: 'Courier New', Courier, monospace;
     font-weight: 900;
     font-size:larger;
 }

 .alert-success {
    background-color: aquamarine;
 }
 span {
     color: green;
 }




    </style>
    <body>

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'><strong><span>Successfully Done</span></strong></div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



        <div>
        <div class="innerdiv">
        <h1 style="margin-bottom: 30px; margin-top:30px;">DIGITAL LIBRARY</h1>
        <h2 style="color: Darkcyan;font-family: monospace; ">Welcome Admin</h2>
            <div class="leftinnerdiv" >
                
                <Button class="greenbtn" onclick="openpart('addbook')" ><b>ADD BOOK</b></Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" ><b>BOOK RECORDS</b></Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><b>BOOK REQUESTS</b></Button>
                <Button class="greenbtn" onclick="openpart('addperson')"><b>ADD USER</b></Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"><b>USER RECORD</b></Button>
                <Button class="greenbtn"  onclick="openpart('issuebook')"><b>ISSUE BOOK</b></Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"><b>ISSUE RECORD</b></Button>
                
                <a href="login.php"><Button class="greenbtn" ><b>LOGOUT</b></Button></a>
                <br>
            </div>
          


            <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>BOOK REQUEST APPROVE</b></Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn'>Approved Book</button></a></td>";
                $table.="</tr>";
            
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>ADD NEW BOOK</b></Button>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label>
                                    <input type="text" name="bookname"/>
            </br>
            <label>Detail:</label><input  type="text" name="bookdetail"/></br>
            <label>Author:</label><input type="text" name="bookaudor"/></br>
            <label>Publication:</label><input type="text" name="bookpub"/></br>
            <div  style="margin-left:80px; font-family:'Courier New', Courier, monospace;">Branch:<input type="radio" name="branch" value="other"/>other<input type="radio" name="branch" value="BSIT"/>CS
            <div style="margin-left:80px; font-family:'Courier New', Courier, monospace;"><input type="radio" name="branch" value="BSCS"/>IS<input type="radio" name="branch" value="BSSE"/>EC</div>
            </div>   
            <label>Price:</label><input  type="number" name="bookprice"/></br>
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <label>Book Photo:</label><input type="file" name="bookphoto"  style="padding: 10px 12px; border-radius: 12px;"/></br>
            </br>
   
            <input type="submit" value="Add Book"  style="padding: 10px 12px; border-radius: 12px;"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>ADD USER</b></Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">Teaching</option>
                <option value="student">Non-teaching</option>
                
            </select>

            <input type="submit" value="Add User"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>USER RECORD</b></Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
        
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>ISSUE BOOK RECORD</b></Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

<!--             

issue book -->
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>ISSUE BOOK</b></Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label  for="book">Choose Book:</label>
            <select name="book"  style="padding: 10px 12px; border-radius: 12px;">
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>

            <label for="Select Student" style="padding-top: 40px; border-radius: 12px;">Person:</label>
            <select name="userselect"  style="padding: 10px 12px 10px 12px; border-radius: 12px;" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
          <br>
          <br>
          
           <lable>Days</lable><input type="number" name="days" style="padding: 10px 12px; border-radius: 12px;"/>
           <br>
           <br>
            <input type="submit" value="Issue Book" style="padding: 10px 12px; border-radius: 12px;"/>
            <br>
            <br>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" ><b>BOOK DETAILS</b></Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width="280px" height="200px" style="border:1px solid #333333; border-radius: 15px; float: right; margin-right:120px; margin-top:40px;" src="uploads/<?php echo $bookimg?> "/>
            </br>
            <p style="color:black">Book Name: &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black">Book Detail: &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black">Book Authour: &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black">Book Publisher: &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:black">Book Branch: &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:black">Book Price:&nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black">Book Available: &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:black">Book Rent: &nbsp&nbsp<?php echo $bookrent ?></p>


            </div>
            </div>



            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" ><b>BOOK RECORD</b></Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th><th>Operation</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn'>View BOOK</button></a></td>";
                 $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'><button type='button' class='btn'>Delete</button></a></td>";
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>



        </div>
        </div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    </body>
</html>