@extends('layouts.app')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('storage/banner1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('storage/banner2.jpg')}}" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<div class="col-xl-10 col-11 mt-5 mx-auto">
    <div class="row justify-content-center mb-5">
        <div class="col-10 col-lg-4 my-auto">
            <img src="{{asset('/storage/logo.jpg')}}" class="w-100"  alt="image-logo">
        </div>
        <div class="col-10 col-lg-6 font-weight-bold descripcion-index">
            Hosteleria Garcés es una empresa de mantenimiento, venta e instalaciones de maquinaria de Hosteleria. Respaldados por la Junta de Andalucía. Contamos con productos de primera calidad y personal profesional totalmente capacitado. 
        </div>
    </div>
    <div class="row justify-content-around w-100 m-0 marco">
        <h3 class="text-center col-12 font-italic"><strong>NUESTROS SERVICIOS</strong></h3>
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="110px" height="110px" viewBox="0 0 3333.000000 3333.000000"><g transform="translate(0.000000,3333.000000) scale(0.100000,-0.100000)" fill="#cc041c" stroke="none"> <path d="M3526 30659 c-417 -61 -737 -356 -843 -777 -16 -62 -18 -442 -21 -5657 -2 -3857 0 -5619 8 -5682 25 -222 128 -433 289 -593 128 -127 273 -210 459 -263 77 -22 82 -22 1164 -25 l1088 -3 3 2073 c3 1888 4 2079 19 2138 52 204 137 358 274 494 136 137 289 221 494 274 60 15 776 17 10145 20 6981 2 10108 0 10172 -8 223 -25 433 -127 593 -289 127 -128 210 -273 263 -459 l22 -77 3 -2082 2 -2083 1054 0 c1138 0 1122 -1 1282 54 349 118 607 428 663 796 9 56 11 1483 9 5700 l-3 5625 -22 77 c-53 186 -136 331 -263 459 -156 158 -366 262 -581 289 -104 13 -26184 12 -26273 -1z m24263 -3009 c216 -28 424 -131 581 -289 177 -178 274 -397 287 -648 27 -509 -338 -953 -847 -1033 -55 -8 -375 -10 -1190 -8 -1110 3 -1115 3 -1192 25 -186 53 -331 136 -459 263 -416 413 -389 1081 59 1462 141 120 318 199 508 227 88 13 2151 13 2253 1z"/><path d="M7660 19165 l0 -1505 9005 0 9005 0 0 1505 0 1505 -9005 0 -9005 0 0 -1505z"/><path d="M10660 13121 c0 -2233 -2 -2559 -15 -2628 -39 -206 -124 -371 -268 -520 -285 -295 -716 -383 -1100 -223 -253 105 -468 342 -555 610 -45 138 -45 134 -52 815 -7 733 -5 707 -80 888 -186 448 -704 698 -1184 572 -342 -90 -622 -370 -710 -709 -35 -132 -38 -216 -33 -878 5 -699 7 -732 62 -1000 175 -853 730 -1600 1503 -2024 664 -363 1450 -460 2197 -269 391 100 801 306 1130 570 128 102 348 322 450 450 264 329 470 739 570 1130 39 152 71 335 85 490 6 71 10 1025 10 2693 l0 2582 -1005 0 -1005 0 0 -2549z"/><path d="M16660 10621 c0 -4464 -2 -5058 -15 -5128 -39 -206 -124 -371 -268 -520 -285 -295 -716 -383 -1100 -223 -253 105 -468 342 -555 610 -45 138 -45 134 -52 815 -7 733 -5 707 -80 888 -186 448 -704 698 -1184 572 -342 -90 -622 -370 -710 -709 -35 -132 -38 -216 -33 -878 5 -699 7 -732 62 -1000 175 -853 730 -1600 1503 -2024 664 -363 1450 -460 2197 -269 391 100 801 306 1130 570 128 102 348 322 450 450 264 329 470 739 570 1130 39 152 71 335 85 490 7 73 10 1834 10 5193 l0 5082 -1005 0 -1005 0 0 -5049z"/> <path d="M20663 12033 c3 -4008 -2 -3674 62 -3985 175 -853 730 -1600 1503 -2024 664 -363 1450 -460 2197 -269 391 100 801 306 1130 570 128 102 348 322 450 450 264 329 470 739 570 1130 84 330 95 467 95 1226 0 688 -2 721 -60 881 -113 312 -368 539 -708 630 -94 25 -332 30 -427 10 -359 -78 -642 -322 -757 -652 -50 -146 -50 -146 -58 -840 -7 -676 -7 -671 -52 -810 -78 -242 -267 -459 -503 -577 -307 -155 -689 -131 -981 59 -238 157 -408 428 -444 709 -7 57 -10 1225 -10 3606 l0 3523 -1005 0 -1005 0 3 -3637z"/></g></svg>
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Aire acondicionado</p>
                             <p Class=" descripcion-cartas-index text-center m-0">Instaladores de aire acondicionado.</p>
                        </div>
                    </div>
                </div>            
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="#cc041c" width="110px" height="110px"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="8.48" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.8717 17.6255)" width="3" x="16.34" y="12.87"/><path d="M17.5,10c1.93,0,3.5-1.57,3.5-3.5c0-0.58-0.16-1.12-0.41-1.6l-2.7,2.7L16.4,6.11l2.7-2.7C18.62,3.16,18.08,3,17.5,3 C15.57,3,14,4.57,14,6.5c0,0.41,0.08,0.8,0.21,1.16l-1.85,1.85l-1.78-1.78l0.71-0.71L9.88,5.61L12,3.49 c-1.17-1.17-3.07-1.17-4.24,0L4.22,7.03l1.41,1.41H2.81L2.1,9.15l3.54,3.54l0.71-0.71V9.15l1.41,1.41l0.71-0.71l1.78,1.78 l-7.41,7.41l2.12,2.12L16.34,9.79C16.7,9.92,17.09,10,17.5,10z"/></g></g></svg>
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Reparación aire acondicionado</p>
                             <p Class="descripcion-cartas-index text-center m-0">Técnicos especializados</p>
                        </div>
                    </div>
                </div>            
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#cc041c" width="110px" height="110px"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 11h-4.17l3.24-3.24-1.41-1.42L15 11h-2V9l4.66-4.66-1.42-1.41L13 6.17V2h-2v4.17L7.76 2.93 6.34 4.34 11 9v2H9L4.34 6.34 2.93 7.76 6.17 11H2v2h4.17l-3.24 3.24 1.41 1.42L9 13h2v2l-4.66 4.66 1.42 1.41L11 17.83V22h2v-4.17l3.24 3.24 1.42-1.41L13 15v-2h2l4.66 4.66 1.41-1.42L17.83 13H22z"/></svg>
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Frío industrial</p>
                             <p Class="descripcion-cartas-index text-center m-0">Instaladores frigoristas profesionales.</p>
                        </div>
                    </div>
                </div>            
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" width="110px" height="90px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"fill="#cc041c" stroke="none"><path d="M1405 5104 c-45 -23 -85 -65 -106 -109 -17 -38 -19 -78 -19 -647 l0 -608 -278 0 -278 0 -31 -32 c-17 -18 -36 -43 -42 -55 -7 -15 -11 -126 -11 -345 0 -281 3 -332 19 -393 52 -200 190 -434 493 -836 207 -275 331 -485 427 -726 97 -245 120 -367 128 -685 l6 -248 208 0 209 0 0 -210 0 -210 435 0 435 0 0 210 0 210 209 0 208 0 6 243 c4 185 10 266 26 344 40 202 100 366 216 591 96 183 150 268 306 478 292 394 440 647 490 839 16 61 19 112 19 393 0 346 -1 353 -53 410 -20 22 -23 22 -299 22 l-278 0 0 608 c0 681 2 653 -75 720 -48 43 -74 52 -141 52 -92 0 -155 -37 -197 -115 -22 -40 -22 -47 -25 -652 l-3 -613 -844 0 -845 0 0 585 c0 369 -4 602 -10 633 -13 58 -57 115 -111 142 -48 25 -150 27 -194 4z m1370 -2348 c-52 -214 -95 -393 -95 -397 0 -5 105 -10 233 -11 200 -3 232 -5 231 -18 -1 -23 -884 -1154 -884 -1134 0 10 45 195 100 412 56 217 99 401 96 409 -4 10 -51 13 -228 13 -123 0 -229 4 -236 8 -9 6 115 169 430 567 243 307 443 554 445 549 2 -5 -40 -184 -92 -398z"/> </g> </svg> 
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Electricidad</p>
                             <p Class="descripcion-cartas-index text-center m-0">Instalaciones eléctricas de baja y media tensión.</p>
                        </div>
                    </div>
                </div>            
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg version="1.1" fill="#cc041c" class="w-100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="110px" height="90px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><g><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"><path d="M4512.5,5012.2c-955.8-78.7-1591.1-449.1-1950-1132.4l-99.8-193.8l21.1-201.5c71-623.8,393.5-1307,930.8-1969.2c90.2-113.2,165.1-209.2,165.1-215c0-5.8-38.4-61.4-84.4-124.8c-46.1-63.3-88.3-124.8-92.1-136.3c-3.8-13.4-587.3,301.3-1389.5,750.4C1255.5,2213.9,627.9,2565.1,622.1,2569c-21.1,11.5-295.6-543.2-372.3-748.5c-117.1-318.6-151.6-499-149.7-817.6c0-220.7,9.6-309,40.3-426.1c61.4-226.5,147.8-416.5,278.3-614.2c109.4-163.1,128.6-184.2,243.7-239.9C1255.5-572.9,2171-647.7,3170.9-484.6l78.7,13.4l69.1-147.8c38.4-82.5,69.1-155.4,69.1-161.2c0-7.7-621.8-366.6-1381.9-798.4C1245.9-2010.4,624-2369.3,624-2377c0-28.8,330.1-506.7,451-648.7c499-598.8,1101.7-880.9,1794.5-838.7l201.5,11.5l163.1,109.4c209.2,143.9,512.4,443.3,692.9,687.1c247.6,333.9,497.1,794.6,652.5,1205.3c55.7,149.7,67.2,168.9,103.6,159.3c23-5.8,103.6-17.3,178.5-23l138.2-13.4v-1531.6v-1533.5h92.1c205.4,0,621.8,42.2,842.6,86.4c712,143.9,1199.5,489.4,1500.9,1067.1l101.7,191.9l-21.1,195.8c-23,213.1-88.3,479.8-168.9,694.8c-138.2,372.3-443.3,882.9-765.8,1284c-117.1,145.8-163.1,214.9-149.7,232.2c9.6,15.4,51.8,76.8,92.1,138.2c42.2,61.4,76.8,113.2,80.6,117.1c1.9,3.8,621.9-339.7,1380-763.9c756.2-424.2,1387.6-765.8,1401.1-760c44.1,17.3,326.3,610.3,399.2,836.8c101.7,322.4,117.1,422.2,115.2,719.7c0,209.2-9.6,301.3-40.3,416.5c-61.4,224.6-147.8,416.5-278.3,614.2c-109.4,165-128.6,182.3-243.8,239.9c-274.5,134.3-658.3,234.1-1074.8,276.4c-276.4,28.8-846.4,13.4-1170.8-32.6c-370.4-51.8-337.8-61.4-416.5,113.2c-38.4,80.6-65.2,151.6-61.4,155.5c3.8,5.8,625.7,358.9,1380,788.8c754.3,429.9,1376.1,785,1380,788.8c11.5,11.5-168.9,289.8-316.7,489.4c-537.4,719.7-1151.6,1046-1907.8,1007.6l-220.7-11.5l-157.4-107.5c-524-355.1-1015.3-1034.5-1332-1846.3c-72.9-188.1-90.2-215-122.8-207.3c-21.1,5.8-101.7,15.4-176.6,23l-140.1,13.4v1531.6v1533.5l-147.8-1.9C4769.7,5029.5,4616.1,5021.8,4512.5,5012.2z M5224.5,1014.4c155.4-42.2,272.5-107.5,399.2-226.5c305.1-284,381.9-706.3,199.6-1084.4c-24.9-49.9-105.6-153.6-180.4-228.4c-203.5-205.4-418.4-289.8-696.7-272.5c-656.4,42.2-1055.6,719.7-775.4,1318.5c63.3,136.3,286,360.8,416.5,424.2C4786.9,1039.3,5032.6,1066.2,5224.5,1014.4z"/></g></g></svg>
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Ventilación</p>
                             <p Class="descripcion-cartas-index text-center m-0">Ventilación industrial.</p>
                        </div>
                    </div>
                </div>            
                <div class="col-xs-6 col-sm-5 col-lg-3 cartas-index m-3">       
                    <div class="row my-auto h-100">
                        <div class="col-6 my-auto">
                            <svg version="1.0" class="w-100 mt-2" xmlns="http://www.w3.org/2000/svg" width="110px" height="90px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"fill="#cc041c" stroke="none"><path d="M1970 5100 c-41 -11 -118 -41 -170 -67 -80 -40 -110 -62 -191 -143 -86 -85 -102 -107 -147 -200 -62 -126 -80 -198 -87 -350 -3 -63 -8 -134 -10 -156 l-4 -42 117 -6 c64 -3 156 -9 203 -12 l86 -6 7 142 c13 244 71 347 243 428 l58 27 485 0 485 0 58 -27 c172 -81 230 -184 243 -428 l7 -142 86 6 c47 3 139 9 203 12 l117 6 -4 42 c-2 22 -7 93 -10 156 -7 152 -25 224 -87 350 -45 93 -61 115 -147 200 -81 81 -111 103 -191 143 -174 86 -179 87 -764 86 -471 0 -517 -2 -586 -19z"/> <path d="M440 3924 c-163 -43 -307 -160 -381 -309 -48 -98 -59 -155 -59 -317 l0 -148 495 0 495 0 0 55 c0 61 19 108 49 125 26 13 456 13 482 0 30 -17 49 -64 49 -125 l0 -55 990 0 990 0 0 55 c0 61 19 108 49 125 26 13 456 13 482 0 30 -17 49 -64 49 -125 l0 -55 496 0 496 0 -4 168 c-3 141 -7 176 -26 226 -62 169 -197 305 -365 368 l-62 23 -2085 2 c-1798 2 -2093 0 -2140 -13z"/> <path d="M0 2122 c0 -928 -2 -893 66 -1022 72 -137 189 -237 339 -288 l80 -27 2075 0 2075 0 80 27 c150 51 267 151 339 288 68 129 66 94 66 1022 l0 838 -494 0 -495 0 -3 -169 c-4 -234 0 -231 -288 -231 -288 0 -284 -3 -288 231 l-3 169 -989 0 -989 0 -3 -169 c-4 -234 0 -231 -288 -231 -288 0 -284 -3 -288 231 l-3 169 -495 0 -494 0 0 -838z"/></g></svg>
                        </div>    
                        <div class="col-6 my-auto p-1">
                             <p class="h5 titulo-cartas-index text-center mb-1">Mantenimiento</p>
                             <p Class="descripcion-cartas-index text-center m-0">Mantenimiento preventivo y correctivo.</p>
                        </div>
                    </div>
                </div>            
            </div>

            <div class="row justify-content-around w-100 mx-0 marco">
                <h2 class="col-12 text-center py-4"><strong>ESTAS MARCAS CONFIAN EN NOSOTROS</strong></h2>

                <h3 class="col-12 col-md-6 order-1 order-md-1 text-center font-italic mt-4"><strong>NUESTROS PROVEEDORES:</strong></h3>
                <h3 class="col-12 col-md-6 order-3 order-md-2 text-center font-italic mt-4"><strong>SERVICIO DE ATENCIÓN TÉCNICA OFICIAL:</strong></h3>
                
                <div class="col-md-5 col-12 order-2 order-md-3 my-auto">
                    <div class="row justify-content-around w-100 mx-0">
                        <div class="col-6 d-flex align-items-center">
                            <img class="w-100" src="{{asset('storage/leroymerlin.png')}}" alt="">
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <img class="w-100" src="{{asset('storage/haier.png')}}" alt="">
                        </div>
                    </div>  
                </div>
                
                <div class="col-12 col-md-5 order-4 order-md-4 my-auto">
                   <div class="row justify-content-around w-100 mx-0">
                        <div class="col-6 d-flex align-items-center">
                            <img class="w-100" src="{{asset('storage/bricomart.png')}}" alt="">
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <img class="w-100" src="{{asset('storage/olimpiasplendid.png')}}" alt="">
                        </div>
                    </div>
                </div>

                <h3 class="col-12 col-md-6 order-5 order-md-5 text-center font-italic mt-4"><strong>ENTIDADES FINANCIERAS:</strong></h3>
                <h3 class="col-12 col-md-6 order-7 order-md-6 text-center font-italic mt-4"><strong>AVALADOS POR:</strong></h3>
 
                <div class="col-12 col-md-5 order-xs-6 order-md-7 my-auto">
                    <div class="row justify-content-around w-100 mx-0">
                         <div class="col-10 d-flex align-items-center">
                             <img class="w-100" src="{{asset('storage/caixabank.png')}}" alt="">
                         </div>
                     </div>
                 </div>

                 <div class="col-12 col-md-5 order-8 order-md-8 my-auto">
                    <div class="row justify-content-around w-100 mx-0">
                         <div class="col-10 d-flex align-items-center">
                             <img class="w-100" src="{{asset('storage/logo andalucia.png')}}" alt="">
                         </div>
                     </div>
                 </div>
            </div>

            <div class="row justify-content-around w-100 mx-0 marco">
                <div class="col-8">
                    <img id="principal" class="w-100" src="{{asset('storage/local1.jpg')}}" alt="">
                    <div class="row justify-content-center mt-1">
                        <img id="1" class="col-2 marco w-100 h-100" onclick="choice(this.id)" style="" src="{{asset('storage/haier.png')}}" alt="">
                        <img id="2" class="col-2 marco w-100 h-100" onclick="choice(this.id)" style="" src="{{asset('storage/haier.png')}}" alt="">
                        <img id="3" class="col-2 marco w-100 h-100" onclick="choice(this.id)" style="" src="{{asset('storage/haier.png')}}" alt="">
                        <img id="4" class="col-2 marco w-100 h-100" onclick="choice(this.id)" style="" src="{{asset('storage/haier.png')}}" alt="">
                        <img id="5" class="col-2 marco w-100 h-100" onclick="choice(this.id)" style="" src="{{asset('storage/haier.png')}}" alt="">
                    </div>
            </div>
</div>
@endsection