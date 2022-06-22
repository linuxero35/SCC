<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
  
    <div class="container-fluid" style="width: 50%;">
    <form class="row g-3">
    <center>
        <div><h2>Datos Personales</h2></div>
        </center>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nombre</label>
          <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Apelliodo Paterno</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
          <label for="inputAddress2" class="form-label">Correo Electrónico</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
          <div class="form-check">
          <label class="form-check-label" for="gridCheck">
              Activo
            </label>
            <input class="form-check-input" type="checkbox" id="gridCheck">
          </div>
        </div>
        
        <hr class="border-secondary border-3 opacity-75">


        <center>
        <div><h2>Datos Escolares</h2></div>
        </center>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Generación</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">Grado</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputZip" class="form-label">Año</label>
          <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">No.Lista</label>
          <input type="text" class="form-control" id="inputCity">
        </div>

        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
</body>
</html>