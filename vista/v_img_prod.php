<?php include ("../controlador/c_prod_img.php"); ?>
<form action = ""  method="post" enctype="multipart/form-data" > 
    <div class="file-field input-field">
             <div class="btn-small amber darken">
                <br><span>Elige una imagen</span><br>
                <br><input type="file" name="foto" id="foto" onchange="vista_preliminar(event)"><br>
             </div>
             <div class="file-path-wrapper">
                 <input type="hidden" text="" class="file-path validate"> 
             </div>
         </div>
         <div class = "imagin"> 
             <img src="<?php echo $data["imagen"];?>" src="" alt="" id="img-foto"><br> 
         </div>
            
         <div class="input-field">
        <br><button type="submit"  class="botones_seccion_editar" name="btn-agregar" >Agregar</button>
        <br>  
            
            <br>
            <br>
            <br>
            <br>
         </div>  

            <script>
                let vista_preliminar = (event)=>{
                let leer_img = new FileReader();
                let id_img = document.getElementById('img-foto');

                leer_img.onload = ()=>
                {

                  if(leer_img.readyState == 2)
                  {

                     id_img.src = leer_img.result

                  }                    

                }
                leer_img.readAsDataURL(event.target.files[0])
            }
            
            </script>
        </form>