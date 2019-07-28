<style>
.mensaje-recivido{
  text-align: left;
  font-family: "Calibri Light", Times, serif;
  font-size: 15px; 
  vertical-align: middle;
} 
.mensaje-enviado{
  text-align: right;
  font-family: "Calibri Light", Times, serif;
  font-size: 15px; 
  vertical-align: middle;
 
} 
.enviado {    
  position: relative;
  margin-top:5px;
  display: inline-block;
  max-width: 300px;  
  left: -1%;
  background-color: D9F3FC;
  border-radius:10px 10px 0px 10px;
  color: #4B610B;
  border: 1px solid MOCCASIN;
  line-height: 10px
  margin: 50px; 
  padding-bottom: 5px ;
  padding-left: 5px ;
  padding-right: 5px;
  padding-top: 5px;
} 
.recivido{  
  position: relative;
  margin-top:5px;
  display: inline-block;
  max-width: 300px;  
  right: -1%;
  background-color: #D0F5A9;
  border-radius:10px 10px 10px 0px;
  color: #4B610B;
  border: 1px solid MOCCASIN;
  line-height: 10px
  margin: 50px; 
  padding-bottom: 5px ;
  padding-left: 5px ;
  padding-right: 5px;
  padding-top: 5px;
} 
</style>
<?php
    include('connexion.php');

            function info_recuper_recupemessage(){
             $infos = array();
             //$usersend
             $query = mysql_query("SELECT * FROM chattable WHERE usersend = '{$_GET['usersend']}' AND userrecive = 'dfvivanco' || usersend = 'dfvivanco' AND userrecive = '{$_GET['usersend']}' ORDER BY idchat ") or die(mysql_error());
			 ?>
			 <div class="mensaje-recivido">
			<div class="recivido">Bienvenido a ControlGP, Estamos Para Servirle Indiquenos su Nombre y en que Podemos Ayudarlo.</div>
			</div>
			 <?php
             while($rows = mysql_fetch_assoc($query)){
                 $infos[]=$rows;
             }
             return $infos;
            }

            $infos = info_recuper_recupemessage();
            foreach ($infos as $info) {
                  if ($info['usersend'] == "dfvivanco") {
                        ?>
						<div class="mensaje-recivido">
						<div class="recivido"><?php echo $info['dateheur'];?><BR><?php echo $info['message'];?></div>
                          </div>
						
                        <?php
                  }else{
                        ?>
						<div class="mensaje-enviado">
                        <div class="enviado"><?php echo $info['dateheur'];?><BR><?php echo $info['message'];?></div>
                      </div>
					  <script type="text/javascript">
                                    function getMessages(letter) {
                            var div = $("#style-5");
                            div.scrollTop(div.prop('scrollHeight'));
                        }

                        $(function() {
                            getMessages();
                        });
                        </script>
                        <?php
                  }
            }
?>
