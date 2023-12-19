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
    .doors {
        display: flex;
    }

    .door {
        background: #fafafa;
        width: 20rem;
        height: 25rem;
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
        font-size: 15rem !important;
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
            <img id="image_header" class="img-fluid" style="height: 300px; cursor: pointer;" draggable="false">
        </button>
        <div class="doors" style="cursor: pointer;">
            <div class="door">
                <strong>
                    <div id="item1" class="boxes" data-array="array1"></div>
                </strong>
            </div>

            <div class="door">
                <strong>
                    <div id="item2" class="boxes" data-array="array3"></div>
                </strong>
            </div>

           <div class="door">
                <strong>
                    <div id="item3" class="boxes" data-array="array2"></div>
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

        var current_location = $(location).attr('pathname')+window.location.search;
        $(document).ready(function(){
            if(current_location == '/slot_machine?gold'){
                var image_url = '/storage/images/XMAS-LOGO-GOLD.png';
            }
            else if(current_location == '/slot_machine?silver'){
                var image_url = '/storage/images/XMAS-LOGO-SILVER.png';
            }
            else if(current_location == '/slot_machine?black'){
                var image_url = '/storage/images/XMAS-LOGO-BLACK.png';
            }
            else if(current_location == '/slot_machine?dollar'){
                var image_url = '/storage/images/XMAS-LOGO-DOLLAR.png';
            }
            else{
                var image_url = '/storage/images/XMAS-LOGO-WHITE.png';
            }
            $('#image_header').attr('src', image_url);
            const array1 = ['🥇', '🥈', '🥉','💵','🥇', '🥈', '🥉','💵','🥇', '🥈', '🥉','💵'];
            const array2 = ['♠️', '♥', '♦️', '♣️','♠️', '♥', '♦️', '♣️','♠️', '♥', '♦️', '♣️'];
            var array3   = ['A', 'K', 'Q', 'J','10','9','8','7','6','5','4','3','2'];
            const doors  = $('.door');

            $('#spinner').on('click', spin);
            $('#reseter').on('click', init);

            var concatenatedResult;
            var resultsArray = [];
            function init(firstInit = true, groups = 1, duration = 1){
                concatenatedResult = '';
                doors.each(function (index){
                    const door = $(this);
                    if(firstInit){
                        door.data('spinned', '0');
                    }
                    else if(door.data('spinned') === '1'){
                        return;
                    }

                    const boxes = door.find('.boxes');
                    const boxesClone = boxes.clone().empty();
                    const pool = ['⭐'];

                    if(!firstInit){
                        const arrayToUse = index === 0 ? array1 : (index === 1 ? array3 : array2);
                        const arr = [];
                        for(let n = 0; n < (groups > 0 ? groups : 1); n++){
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

                            concatenatedResult += $(this).find('.box').map(function () {
                                return $(this).text();
                            }).get().join();

                            if(index == 0){
                                $("#machine_sound")[0].pause();
                                $("#machine_sound")[0].currentTime = 0;
                                $("#finished_sound")[0].play();
                            }
                            if(index == 1){
                                $("#machine_sound")[0].pause();
                                $("#machine_sound")[0].currentTime = 0;
                                $("#finished_sound")[0].play();
                            }
                            if(index == 2){
                                $("#machine_sound")[0].pause();
                                $("#machine_sound")[0].currentTime = 0;
                                $('.box').each(function(){
                                    if(['♥','♦️'].includes($('.boxes[data-array="array2"] > .box:first').text())){
                                        $('.boxes[data-array="array3"] > .box:first').addClass('text-danger');
                                    }
                                });

                                if($.inArray(concatenatedResult, resultsArray) !== -1){
                                    $('#reseter').click();
                                    setTimeout(() => {
                                        $('#spinner').click();
                                    }, 200);
                                }
                                else{
                                    resultsArray.push(concatenatedResult);
                                    console.log(resultsArray);
                                    jsConfetti.addConfetti({
                                        confettiNumber: 1000,
                                        confettiColors: [
                                            '#ff0a54', '#ff477e', '#ff7096', '#ff85a1', '#fbb1bd', '#f9bec7',
                                        ],
                                    });
                                    $("#confetti_sound")[0].play();
                                }
                                $('#btnSpinner').prop('disabled', false);
                            }
                        });
                    }

                    for(let i = pool.length - 1; i >= 0; i--){
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
                $('#btnSpinner').prop('disabled', true);
                if(concatenatedResult){
                    $('#reseter').click();
                    setTimeout(() => {
                        $('#spinner').click();
                    }, 200);
                }
                else{
                    init(false, 1, 2);
                    $('#item1').css('transform', 'translateY(0)');
                    $("#machine_sound")[0].play();
                    setTimeout(() => {
                        $("#machine_sound")[0].play();
                        $('#item2').css('transform', 'translateY(0)');
                        setTimeout(() => {
                            $("#machine_sound")[0].play();
                            $('#item3').css('transform', 'translateY(0)');
                        }, 4500);
                    }, 4500);

                }
            }

            function shuffle([...arr]){
                let m = arr.length;
                while(m){
                    const i = Math.floor(Math.random() * m--);
                    [arr[m], arr[i]] = [arr[i], arr[m]];
                }

                if(arr.includes('🥇') && current_location == '/slot_machine?gold'){
                    arr.push('🥇');
                }
                else if(arr.includes('🥈') && current_location == '/slot_machine?silver'){
                    arr.push('🥈');
                }
                else if(arr.includes('🥉') && current_location == '/slot_machine?black'){
                    arr.push('🥉');
                }
                else if(arr.includes('💵') && current_location == '/slot_machine?dollar'){
                    arr.push('💵');
                }
                console.log(arr);
                return arr;
            }
            init();
        });

        setInterval(() => {
            $('.box').each(function(){
                if($(this).text() == '♥' ||  $(this).text() == '♦️'){
                    $(this).addClass('text-danger');
                }
            });
        }, 0);
    </script>
</body>
</html>