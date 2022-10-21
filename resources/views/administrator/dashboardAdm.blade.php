<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style> 
            body{
                padding: 0px;
                margin: 0px;
            }
            .corpo{
                width: 100%;
                height: 700px;
                display: flex;
            }
            .header{
                width: 100%;
                height: 95px;
                display: flex;
                background: hsla(118, 94%, 21%, 1);
                background: linear-gradient(90deg, hsla(118, 94%, 21%, 1) 0%, hsla(126, 68%, 47%, 1) 50%, hsla(117, 100%, 25%, 1) 100%);
                background: -moz-linear-gradient(90deg, hsla(118, 94%, 21%, 1) 0%, hsla(126, 68%, 47%, 1) 50%, hsla(117, 100%, 25%, 1) 100%);
                background: -webkit-linear-gradient(90deg, hsla(118, 94%, 21%, 1) 0%, hsla(126, 68%, 47%, 1) 50%, hsla(117, 100%, 25%, 1) 100%);
            }
            .header-left{
                display: flex;
                justify-content: space-between;
                padding-left: 30px;
                width: 60%;
            }
            .header-h1 h1{
                display: flex;
                color: white;
                font-family: arial;
                border-bottom: solid 1px;
            }
            .header-right{
                display: flex;
                width: 40%;
                justify-content: flex-end;
                align-items: center;
            }
            .header-form{
                padding-right: 15px;
            }
            .header-form input{
                width: 85px;
                height: 30px;
                border-radius: 5px;
                border: solid 1px;
                border-color:white;
                background-color: transparent;
                font-family: arial;
                color: white;
                font-size: 13px;
            }
            .header-form input:hover{
                width: 87px;
                height: 32px;
                font-size:15px;
            }
            .header-form{
                display: flex;
            }
            .afasta-header-corpo{
                border: solid 2px;
                width: 100%;
                height: 20px;
            }
            .corpo-left{
                display: flex;
                width: 15%;
                height: 700px;
                background-color: white;
            }
            .left-left-menu{
                width: 100%;
                height: 500px;
                display: flex;
                flex-direction: column;
                color: #367c40;
            }
            .left-left-menu-h2{
                display: flex;
                justify-content: center;
            }
            .left-left-menu-h2 h2{
                font-size: 28px;
                border-bottom: solid 1px;
            }
            .left-left-menu-lista{
                display: flex;
                flex-direction: column;
                font-family: arial;
            }
            .left-left-menu-lista li{
                padding-bottom: 5px;
            }
            .left-left-menu-lista ul{
                margin: 0px;
                padding: 10px ;
                list-style: none;
            }
            .left-left-menu-lista-li{
                border-bottom: solid 1px;
            }
            .corpo-right{
                display: flex;
                width: 85%;
                height: 700px;
                background-image: url(book101.png);  
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            .corpo-right-corpo{
                width: 100%;
                height: 700px;
            }
            .corpo-right-corpo-h2{
                display: flex;
                justify-content: center;
            }
            .corpo-right-corpo-h2 h2{
                font-family: arial;
                color: white;
                font-size: 30px;
                font-style: italic;
                border-bottom: solid 1px;
            }
            .corpo-right-corpo-form{
                display: flex;
                justify-content: center;
            }
            #corpo-right-corpo-form-text{
                width: 500px;
                height: 25px;
                border: none;
                border-radius: 10px;
            }
            #corpo-right-corpo-form-text:hover{
                background-color: lightyellow;
            }
            #corpo-right-corpo-form-submit{
                border: none;
                height: 25px;
                width: 90px;
                border-radius: 10px;
            }
          #corpo-right-corpo-form-submit:hover{
                background-color: lightyellow;
            }
        </style>

</head>
    <body>

        <div class="header">

            <div class="header-left">
                <div class="header-h1">
                    <h1> Bem Vindo</h1> 
                </div>
                <div class="header-h1">
                    <h1> Biblioteca Júlia Rodrigues</h1> 
                </div>
            </div>

            <div class="header-right">
                <div class="header-form">
                  <form>
                        <input type="submit" value="Logout">
                    </form>
                </div>
            </div>
        </div>

        <div class="corpo">
            
            <div class="corpo-left"> 
                <div class="left-left-menu"> 
                    <div class="left-left-menu-h2"> 
                        <h2>Menu</h2> 
                    </div>

                    <div class="left-left-menu-lista">
                        <ul>
                            <li class="left-left-menu-lista-titulo">BIBLIOTECA</li> 
                            <li >Literatura Brasileira</li> 
                            <li >Eletrotécnica</li> 
                            <li >Informática para Internet</li> 
                            <li >Vestuário</li> 
                            <li class="left-left-menu-lista-li">Têxtil</li> 
                        </ul> 

                        <ul>
                            <li class="left-left-menu-lista-titulo">SALAS DE ESTUDO</li> 
                            <li>Confirmações</li> 
                            <li class="left-left-menu-lista-li">Histórico</li> 
                        </ul> 

                       <ul>
                            <li class="left-left-menu-lista-titulo">COMPUTADORES</li> 
                            <li>Confirmações</li> 
                            <li class="left-left-menu-lista-li">Histórico</li> 
                        </ul> 

                    </div> 
                </div>
            </div>

            <div class="corpo-right">
                <div class="corpo-right-corpo">
                    
                    <div class="corpo-right-corpo-h2">
                        <h2>"A Leitura Amplia o Compo do Conhecimento"</h2>
                    </div>


                    <div class="corpo-right-corpo-form">
                        <form action="POST" method="{{url()}}">
                            <input id="corpo-right-corpo-form-text" type="text" name="">
                            <input id="corpo-right-corpo-form-submit" type="submit" value="Pesquisar">
                        </form>
                    </div>

                </div>
            </div>
        </div> <!-- fim da div corpo  --> 
                

    </body>
</html>