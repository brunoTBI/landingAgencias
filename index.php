<?php
//Script para el formulario de agencias
require_once('./src/phpControllers/ValidateController.php');
require_once('./src/phpControllers/DatabaseController.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requiredInputs = [
        "company",
        "contactPerson",
        "phone",
        "mail",
        "password",
        "cif_nif",
        "address",
        "postalCode",
        "city",
        "province",
        "country"
    ];

    $validationController = new ValidateController();
    $databaseController = new DatabaseController();

    if($validationController->settedInputs($requiredInputs)){
        $agencyArray = $validationController->returnInputs($requiredInputs);
        $databaseController->insertAgency($agencyArray);
        $_POST = [];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario agencias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./src/styles/styles.css">
    <script src="./src/js/script.js"></script>
</head>
<body>
    <header class="flex justify-content-start items-center w-full h-[70px] bg-[#044b7f]" >
        <img class="max-h-[50px] max-w-[225px] pl-[10px]" src="./src/images/logo-tubuencamino.svg" alt="" class="logo">

    </header>
    <main class="w-full flex flex-col">
        <div class="basis-5/5 flex bg-[#f4f4f4] h-[300px]">
            <div class="basis-3/5 flex flex-col justify-center">
                <h4 class="text-center text-5xl font-semibold h-[80px]">Agencias</h4>
                <p class="text-center h-[80px]">Trabaja con nosotros</p>

            </div>
            <div class="basis-2/5 bg-[#f4f4f4] h-[300px] bg-[url('./src/images/ilustracion-camino-santiago.svg')]">

            </div>
           
        </div>
        <div class="w-full flex flex-col md:flex-row my-[70px]">
        <div class="basis-5/5 md:basis-3/5">
            <section class="flex justify-around">
                
                <h4 class="basis-3/3 md:basis-1/3 text-xl mb-4">Formulario agencias</h4>
                <span class="basis-1/3"></span>

            </section>
            <form class="flex flex-col" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="agencyRegisterForm">
            
            <div class="flex justify-around flex-col md:flex-row ">
            <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="company"placeholder="Nombre de la agencia">
            <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="cif_nif" placeholder="CIF o NIF">
            </div>    

            <div class="flex justify-around flex-col md:flex-row ">

                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="contactPerson"placeholder="Persona de contacto">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="tel" name="phone" placeholder="Teléfono" >
            </div>
            <div class="flex justify-around flex-col md:flex-row ">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="email" name="mail" placeholder="Correo">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="password" name="password" placeholder="Contraseña">

            </div>
            <div class="flex justify-around flex-col md:flex-row ">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="country" placeholder="País">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="province" placeholder="Provincia">
            </div>
            <div class="flex justify-around flex-col md:flex-row "> 
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="city" placeholder="Ciudad">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="postalCode" placeholder="Código postal">
            </div>
            <div class="flex justify-around flex-col md:flex-row ">
                <input class="border-solid border-[1px] h-[40px] rounded border-current basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px] text-center" type="text" name="address" placeholder="Dirección">
                <span class="basis-3/3 md:basis-1/3 mb-4 mx-[5px] md:mx-[0px]"></span>
                
            </div>
           
            
            
            <section class="flex justify-start md:justify-around">
                <div class="basis-2/3 md:basis-1/3 flex justify-content-start">
                    <button class="bg-[#facd00] font-semibold border-solid rounded p-[2px] h-[40px] w-[100px] mx-[5px] md:mx-[0px] " type="submit">ENVIAR</button>
                </div>
                
                <span class="basis-1/3"></span>
            </section>

        </form>
        </div>
        
        <div class="flex flex-col basis-5/5 md:basis-2/5 pl-[20px] ">
            <h4 class="text-lg mb-4">¿Necesitas ayuda?</h4>
            <p class="mb-4">Caminamos siempre a tu lado, si tienes alguna duda <br>puedes contar con nosotros.</p>
            <h4 class="text-lg mb-4">Teléfono de contacto</h4>
            <div class="flex w-fullmb-4">
                <img class="max-h-[70px] max-w-[40px] " src="./src/images/icon-atencion-usuario.svg" alt="">

                <section class="pl-[10px]">
                    <span class="text-xl text-[#5784b7] font-bold mb-4">+34 981 112 147</span>
                    <p class="mb-4">De Lunes a Viernes<br>De 9:00 a 19:00</p>

                </section>
            </div>

        </div>
        </div>

    </main>
    <footer class="flex flex-col w-full">
    <div class=" flex flex-col-reverse md:flex-row justify-start mt-5 mb-6 ">
        <div class="basis-3/3 md:basis-1/3 flex " >
            <img src="./src/images/logo-xacobeo2122.png" alt="" class="max-w-[200px]"></div>
        <div class="basis-3/3 md:basis-1/3 flex justify-start  md:justify-center items-start  md:items-center pt-5 md:pt-0">
            <p>Licencia de Agencia de Viajes XG-776</p>
        </div>

        <div class="basis-3/3 md:basis-1/3 flex items-start md:items-end flex-col border-b-[1px] border-black md:border-b-0  pb-5 md:pb-0"> 
            <p>Garantía de pago seguro</p>
            <img src="./src/images/tarjetas.png" alt="" class="w-1/3">
        </div>
    </div>
        <div class="flex flex-col items-center bg-[#035185ff]  ">
            <img src="./src/images/logo-tubuencamino.svg" alt="" class="max-w-[270px] mt-5">
            <h2 class="text-white ">© 2024 Agencia Tu buen camino, S.L. Todos los derechos reservados</h2>
        </div>
    </footer>
    
</body>
</html>