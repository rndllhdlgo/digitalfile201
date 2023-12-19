<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/storage/images/christmas-tree.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
    <title>Christmas Raffle</title>
</head>

<style>
    body{
        background: #180034
    }
    #app {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .door {
        background: #fafafa;
        width: 70rem;
        height: 15rem;
        overflow: hidden;
        border-radius: 5px;
        margin: 5px;
    }

    .boxes {
        transition: transform 1s ease-in-out;
    }

    .box {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 3.5rem !important;
    }

    .buttons {
        margin: 1rem 0 2rem 0;
    }

    button {
        cursor: pointer;
        font-size: 1.2rem;
        margin: 0 0.2rem;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .info {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
</style>
<body>
    <div id="app" class="responsive">
        <div id="confetti_div"></div>
        <audio id="confetti_sound" preload="auto">
            <source src="/storage/sounds/congratulations_effect.mp3" type="audio/mp3">
        </audio>
        <audio id="machine_sound" preload="auto">
            <source src="/storage/sounds/machine_soundfx.mp3" type="audio/mp3">
        </audio>
        <audio id="finished_sound" preload="auto">
            <source src="/storage/sounds/finished_soundfx.mp3" type="audio/mp3">
        </audio>
        <button id="btnSpinner" onclick="$('#spinner').click();" style="background-color:transparent;">
            <img id="image_header" src="/storage/images/XMAS-LOGO-WHITE.png" class="img-fluid" style="height: 300px; cursor: pointer;" draggable="false">
        </button>
        <div class="doors" style="cursor: pointer;">
            <div class="door">
                <strong>
                    <div id="item1" class="boxes"></div>
                </strong>
            </div>
            <div class="door">
                <strong>
                    <div id="item2" class="boxes"></div>
                </strong>
            </div>
        </div>

        <div class="buttons d-none" style="zoom: 120%;">
            <button id="spinner">Play</button>
            <button id="reseter">Reset</button>
        </div>
    </div>

    <script>
        var jsConfetti = new JSConfetti();

        $(document).ready(function(){

            var array1 = [
                            'RENDELL HIDALGO',
                            'LANCE NACABUAN',
                            'JEROME LOPEZ',
                            'BONIFACIO LABANG',
                            'RONALDO ARCAGUA',
                            'RENZ VAYRON ABALLE',
                            'BENJAMIN LIGSANAN',
                            'RYAN MOLINA',
                            'EDSEL NUGUID',
                            'BERNIE ADRIAS',
                            'JEROME JUSTIN VALES',
                            'MARY ROSE NAVARRO',
                            'ADRIAN FRANDO',
                            'TJ IBARRETA',
                            'VERGILIO CABACUNGAN'
                        ];
            var array2 = [
                            'CHRISTMAS BASKET',
                            'CHRISTMAS BAG',
                            'LENOVO TRAVEL POUCH A',
                            'LENOVO TRAVEL POUCH B',
                            'FSP POLO-SHIRT A',
                            'FSP POLO-SHIRT B',
                            'FSP POLO-SHIRT C',
                            'TRAVEL BAG',
                            'FLASK',
                            '24-IN-1 PRECISION SCREWDRIVER SET',
                            'PLANNER A',
                            'PLANNER B',
                            'PLANNER C',
                            'SPARKLING APPLE JUICE',
                            'MI GEL BALLPEN'
                        ];
            const doors = $('.door');

            $('#spinner').on('click', spin);
            $('#reseter').on('click', init);

            function init(firstInit = true, groups = 1, duration = 1) {
                doors.each(function (index) {
                    const door = $(this);
                    if (firstInit) {
                        door.data('spinned', '0');
                    } else if (door.data('spinned') === '1') {
                        return;
                    }

                    const boxes = door.find('.boxes');
                    const boxesClone = boxes.clone().empty();
                    const pool = index === 0 ? ['WINNER'] : ['PRIZE'];

                    if(!firstInit){
                        const arrayToUse = index === 0 ? array1 : array2;
                        const arr = [];
                        for (let n = 0; n < (groups > 0 ? groups : 1); n++) {
                            arr.push(...arrayToUse);
                        }
                        pool.push(...shuffle(arr));
                        boxesClone.on('transitionstart', function () {
                            door.data('spinned', '1');
                        });

                        boxesClone.on('transitionend', function () {
                            $(this).find('.box').each(function (index) {
                                if (index > 0) $(this).remove();
                            });

                            if (index === 0) {
                                $("#machine_sound")[0].pause();
                                $("#machine_sound")[0].currentTime = 0;
                                $("#finished_sound")[0].play();
                            }
                            if (index === 1) {
                                $("#machine_sound")[0].pause();
                                $("#machine_sound")[0].currentTime = 0;

                                jsConfetti.addConfetti({
                                    confettiNumber: 1000,
                                    confettiColors: [
                                        '#ff0a54', '#ff477e', '#ff7096', '#ff85a1', '#fbb1bd', '#f9bec7',
                                    ],
                                });

                                $("#confetti_sound")[0].play();
                                array1 = $.grep(array1, function(value) {
                                    return value !== $('.box:eq(0)').text();
                                });
                                array2 = $.grep(array2, function(value) {
                                    return value !== $('.box:eq(1)').text();
                                });

                                console.log(array1);
                                console.log(array2);
                                $('#btnSpinner').prop('disabled', false);
                            }
                        });
                    }

                    for (let i = pool.length - 1; i >= 0; i--) {
                        const box = $('<div></div>').addClass('box').css({
                            width: door.width() + 'px',
                            height: door.height() + 'px',
                        }).text(pool[i]);
                        boxesClone.append(box);
                    }

                    boxesClone.css({
                        transitionDuration: `${duration > 0 ? 4 : 1}s`,
                        transform: `translateY(-${door.height() * (pool.length - 1)}px)`,
                    });
                    boxes.replaceWith(boxesClone);
                });
            }

            async function spin(){
                if(array1.length === 0 || array2.length === 0){
                    Swal.fire({
                        html: "<h4>NO MORE PRIZES</h4>",
                        icon: "error"
                    });
                }
                else{
                    $('#btnSpinner').prop('disabled', true);
                    $('.door').data('spinned', '0');
                    init(false, 1, 2);
                    $('#item1').css('transform', 'translateY(0)');
                    $("#machine_sound")[0].play();
                    setTimeout(() => {
                        $("#machine_sound")[0].play();
                        $('#item2').css('transform', 'translateY(0)');
                    }, 4500);
                }
            }

            function shuffle([...arr]){
                const originalLength = arr.length;
                let m = originalLength;

                while(m){
                    const i = Math.floor(Math.random() * m--);
                    [arr[m], arr[i]] = [arr[i], arr[m]];
                }

                if(originalLength > 10){
                    arr = arr.concat(arr, arr);
                }
                else if(originalLength > 5){
                    arr = arr.concat(arr, arr, arr);
                }
                else if(originalLength > 0){
                    arr = arr.concat(arr, arr, arr, arr);
                }

                return arr;
            }

            init();

            $('.box:eq(0)').text('WINNER');
            $('.box:eq(1)').text('PRIZE');
        });
    </script>
</body>
</html>