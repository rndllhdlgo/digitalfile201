<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/carousel.css">
    <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Christmas Raffle</title>
</head>

{{-- <body>
    <main>
        <button class="btn btn-info" id="spin" style="font-size:40px; background-color:red; color: white;"><b>SPIN TO WIN</b></button>
        <div id="random" class="text-center" style="height:100%; width: 100%; background-color: green; color: yellow;"></div>
    </main>
    <script>
        $(document).ready(function(){
            var timer = 100;
            var phpData = @json($names);
            var index = 0;
            var id;

            if(phpData.length == 0){
                Swal.fire({
                    title: "LIST IS EMPTY",
                    confirmButtonText: "RESET",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            url: '/raffle_reset',
                            success:function(data){
                                window.location.reload();
                            }
                        });
                    }
                });
                return false;
            }
            else{
                function displayNames(){
                    if(!id){
                        $('#random').text(phpData[index].name);
                        setTimeout(function () {
                            index = (index + 1) % phpData.length;
                            displayNames();
                        }, timer);
                    }
                }

                displayNames();

                $('#spin').on('click', function(){
                    setTimeout(() => {
                        timer = 500;
                        setTimeout(() => {
                            id = phpData[index].id;
                            Swal.fire({
                                title: "You are the WINNER!",
                                html: `<div style="overflow:hidden;"> <h1 class="animate__heartBeat">${phpData[index].name}</h1></div>`,
                                showCancelButton: false,
                                confirmButtonText: "CONGRATULATIONS!",
                                allowOutsideClick: false,
                                }).then((result) => {
                                if(result.isConfirmed){
                                    $.ajax({
                                        type: 'GET',
                                        url: '/raffle_status',
                                        data:{
                                            id: id
                                        },
                                        success:function(data){
                                            window.location.reload();
                                        }
                                    });
                                }
                            });
                        }, 4000);
                    }, 1000);
                });
            }
        });
    </script>
</body> --}}

<body>
    <main>
        <button class="btn btn-info" id="spin" style="font-size:40px; background-color:red; color: white;"><b>CLICK TO SPIN</b></button>
        <div id="random" class="text-center" style="height:100%; width: 100%; background-color: green; color: yellow;"></div>
    </main>

    <script>
        $(document).ready(function(){
            var timer = 100;
            var phpData = @json($names);
            var shuffledData = shuffle(phpData);
            var index = 0;
            var id;

            if(shuffledData.length == 0){
                Swal.fire({
                    title: "LIST IS EMPTY",
                    confirmButtonText: "RESET",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            url: '/raffle_reset',
                            success:function(data){
                                window.location.reload();
                            }
                        });
                    }
                });
                return false;
            }
            else{
                function displayNames(){
                    if(!id){
                        $('#random').text(shuffledData[index].name);
                        setTimeout(function () {
                            index = (index + 1) % shuffledData.length;
                            displayNames();
                        }, timer);
                    }
                }

                displayNames();

                $('#spin').on('click', function(){
                    setTimeout(() => {
                        timer = 500;
                        setTimeout(() => {
                            id = shuffledData[index].id;
                            Swal.fire({
                                title: "You are the WINNER!",
                                html: `<div style="overflow:hidden;"> <h1 class="animate__heartBeat">${shuffledData[index].name}</h1></div>`,
                                showCancelButton: false,
                                confirmButtonText: "CONGRATULATIONS!",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if(result.isConfirmed){
                                    $.ajax({
                                        type: 'GET',
                                        url: '/raffle_status',
                                        data:{
                                            id: id
                                        },
                                        success:function(data){
                                            window.location.reload();
                                        }
                                    });
                                }
                            });
                        }, 4000);
                    }, 1000);
                });
            }

            function shuffle(array) {
                var currentIndex = array.length, randomIndex;
                while (currentIndex != 0) {
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex--;

                    [array[currentIndex], array[randomIndex]] = [array[randomIndex], array[currentIndex]];
                }

                return array;
            }
        });
    </script>
</body>
</html>