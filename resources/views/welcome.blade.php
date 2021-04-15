<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Tittle -->
        <title>Database Connections Manager - Vixicom Test</title>

        <!-- Icon Tittle -->
        <link rel="icon" type="image/x-icon" href="../icon/dato.svg">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- Styles -->       
        <style>
            body {
                background-color: rgb(51, 51, 51);
            }

            hr {
                background-color: white;
            }

            table, h1, h2, h3, h4, h5, h6, a, p, label {
                color: white;
            }

            #connection {
                height: 500px;
                border: 1px solid white;
            }

            #data-table-1 td {
                color: white;
            }

            .container-fluid {
                margin-top: 5%;
            }
        </style>

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">
                <i class="fas fa-database"></i>&nbsp;
                Database Connections Manager
            </a>
        </nav>
        <div class="container-fluid">
            <div class="container">
               <div class="row">
                   <div class="col-lg-6" id="connection">
                        <table class="table table-hover" id="data-table-1">
                            <thead>
                                <th class="text-center text-white">Connection Name</th>
                                <th class="text-center text-white">HostName</th>
                            </thead>
                            <tbody> 
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="text-center">Add New Database Connection</h3><hr>
                        <form method="post" action="/api/POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Connection Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="connection_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hostname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hostname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Port</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="port">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Engine</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="engine">
                                        <option selected style="display: none;">Please select the engine</option>
                                        <option value="Microsoft SQL Server">Microsoft SQL Server</option>
                                        <option value="MySQL">MySQL</option>
                                        <option value="PostgreSQL">PostgreSQL</option>
                                        <option value="Oracle">Oracle</option>
                                        <option value="MariaDB">MariaDB</option>
                                        <option value="SQLite">SQLite</option>
                                        <option value="MongoDB">MongoDB</option>
                                        <option value="Firebase">Firebase</option>
                                        <option value="Redis">Redis</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-outline-light">
                                        <i class="fas fa-save"></i>&nbsp;Save
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button type="reset" class="btn btn-outline-light">
                                        <i class="fas fa-eraser"></i>&nbsp;Clear
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#testing">
                                        <i class="fas fa-server"></i>&nbsp;Testing
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>

    
        <div class="modal fade" id="testing" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">
                            <i class="fas fa-database"></i>&nbsp;Select Database Connection
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-responsive" id="data-table-2">
                            <thead>
                                <th class="text-dark">#</th>
                                <th class="text-dark">Connection Name</th>
                                <th class="text-dark">Username</th>
                                <th class="text-dark">Password</th>
                                <th class="text-dark">Hostname</th>
                                <th class="text-dark">Port</th>
                                <th class="text-dark">Engine</th>
                            </thead>
                            <tbody>                                
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i>&nbsp;Cancel
                        </button>
                        <button type="button" class="btn btn-outline-success" 
                            data-toggle="modal" data-target="#InfoTest" onclick="testing_connection()">
                            <i class="fas fa-check"></i>&nbsp;To test
                        </button>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- API Script fetch -->
        @csrf
        <script>
            window.onload = function () {
                fetch(window.location.origin + '/api/GET/DATABASE')
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(element => {
                            var table = document.getElementById("data-table-1");
                            var newRow = table.insertRow(1);
                            var cell1 = newRow.insertCell(0);
                            var cell2 = newRow.insertCell(1);  
                            cell1.innerHTML = element.connection_name;            
                            cell2.innerHTML = element.hostname;
                    
                        });
                        
                        data.forEach(element => {
                            var table = document.getElementById("data-table-2");
                            var newRow = table.insertRow(1);
                            var cell1 = newRow.insertCell(0);
                            var cell2 = newRow.insertCell(1);        
                            var cell3 = newRow.insertCell(2);
                            var cell4 = newRow.insertCell(3);
                            var cell5 = newRow.insertCell(4);
                            var cell6 = newRow.insertCell(5);
                            var cell7 = newRow.insertCell(6);
                            cell1.innerHTML = "<div class='custom-control custom-radio'>" + 
                                            "<input type='radio' id='customRadio" + element.id + "' name='identifier' value='" + element.id + "' class='custom-control-input'>" +
                                            "<label class='custom-control-label' for='customRadio" + element.id + "'></label>" +
                                            "</div>";            
                            cell2.innerHTML = element.connection_name;
                            cell3.innerHTML = element.username;
                            cell4.innerHTML = element.password;
                            cell5.innerHTML = element.hostname;
                            cell6.innerHTML = element.port;
                            cell7.innerHTML = element.engine;
                        });
                    });                    
            };

            function testing_connection() {
                var radios = document.getElementsByName('identifier');
                var Id;
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        Id = radios[i].value;
                    }
                }

                fetch(window.location.origin + '/api/CHECK/DATABASE/' + Id)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("connection-name").innerHTML = "<i class='fas fa-database'></i>&nbsp;Connection Name:&nbsp;" + data.connection_name;
                        document.getElementById('Test-Info').innerHTML = "<div class='d-flex justify-content-center'>" +
                                                                            "<i class='fas fa-thumbs-up fa-10x'></i>" +
                                                                        "</div><br><br>" +
                                                                        "<ul class='list-group'>" +
                                                                        "<li class='list-group-item text-center'><h6 style='color: green;'>This connection is good and strong!</h6></li>" +
                                                                        "<li class='list-group-item text-center'>" + data.hostname + "</li>" +
                                                                        "<li class='list-group-item text-center'>" + data.port + "</li>" +
                                                                        "<li class='list-group-item text-center'>" + data.engine + "</li>" +
                                                                        "</ul>";
                    });
            }
        </script>

        <div class="modal fade" id="InfoTest" tabindex="-1" aria-labelledby="connection-name" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="connection-name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="Test-Info">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i>&nbsp;Close
                </button>
            </div>
            </div>
        </div>
        </div>

        <!-- jQuery - Bootstrap Bundle -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
