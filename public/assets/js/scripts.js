// Owl Carousel
$(".owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 50,
    nav: true,
    dots: false,
    loop: true,
    lazyLoad: true,
    navText: [
        '<div class="bg-orange rounded-circle align-items-center justify-content-center d-flex pe-1" style="font-size:6vh; height: 7vh; width: 7vh;"><i class="fas fa-angle-left"></i></div>',
        '<div class="bg-orange rounded-circle align-items-center justify-content-center d-flex ps-1" style="font-size:6vh; height: 7vh; width: 7vh;"><i class="fas fa-angle-right"></i></div>'
    ],
    responsive: {
        0 : {
            items : 1
        },
        768 : {
            items : 2
        },
        992 : {
            items : 3
        }
    }
});
// End Owl Carousel

// Edit Konten
$('.edit-konten').on('click',function(){
    // get data konten
    const id = $(this).data('id');
    const konten = $(this).data('konten');

    // set data konten
    $('.konten-id').val(id);
    $('.konten').val(konten);

    // show modal
    $('#editModal').modal('show');
});
// Edit Konten


// Quiz
const btn_start = document.querySelector(".btn_start button");
const rules = document.querySelector(".rules");
const btn_lanjut = rules.querySelector(".btn_lanjut button");
const soal = document.querySelector(".soal");
const option_text = document.querySelector(".option_text");
const timecount = soal.querySelector(".timer")

window.onbeforeunload = function() {
    return "Dude, are you sure you want to leave? Think of the kittens!";
}

// Mulai Quiz
btn_start.onclick = () =>{
    rules.style.display = "block";
    // btn_start.style.display = "none";
    btn_start.setAttribute("hidden", "True");
}

// Lanjut Quiz
btn_lanjut.onclick = () =>{
    rules.style.display = "none";
    // btn_lanjut.style.display = "none";
    soal.style.display = "block";
    tampil_soal(0);
    startTimer(timeValue);
    tampil_jml_soal(1);
}

let soal_count = 0;
let no_soal = 1;
let counter;
let timeValue = 10;
let userScore = 0;

// tampil total soal
function tampil_jml_soal(index){
    const jml_soal = soal.querySelector(".total_soal");
    let total_soal_tag = '<span><p><strong>'+index+'</strong> dari <strong>'+data.length+'</strong> Soal</p></span>';
    jml_soal.innerHTML = total_soal_tag;
}


// Ambil Soal dan options
function tampil_soal(index){
    const soal_text = document.querySelector(".soal_text");
    // let soal_tag = '<h5>'+pertanyaan[index].no + '. ' + pertanyaan[index].soal +'</h5>';

    // console.log(data);
    let soal_tag = '<h5>'+(index+1) + '. ' + data[index].soal+'</h5>';

    let jwban = data[index].pilihan.length;
    for(let i = 0; i < jwban;i++){
        let option_tag = '<div class="option d-flex border rounded p-2 justify-content-between mb-2" role="button"><span>'+ data[index].pilihan[i] +'</span></div>';
        option_text.insertAdjacentHTML("beforeend",option_tag);
    }

    soal_text.innerHTML = soal_tag;
    const option = option_text.querySelectorAll(".option");
    for(let i = 0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
}

let icon_bnr = '<div class="text-primary"><i class="fas fa-check-circle fa-lg"></i></div>';
let icon_salah = '<div class="text-danger"><i class="fas fa-times-circle fa-lg"></i></div>';

// Pilih Jawaban
function optionSelected(jawaban){
    clearInterval(counter);
    let user_jwb = jawaban.textContent;
    let jwb_benar = data[soal_count].jawaban;
    let all_option = option_text.children.length;

    if(user_jwb == jwb_benar){
        userScore += 1;
        // console.log(userScore);
        jawaban.classList.add("border-primary");
        jawaban.insertAdjacentHTML("beforeend",icon_bnr);
    }else{
        jawaban.classList.add("border-danger");
        jawaban.insertAdjacentHTML("beforeend",icon_salah);

        for(let i = 0; i < all_option; i++){
            if(option_text.children[i].textContent == jwb_benar){
                option_text.children[i].classList.add("border-primary");
                option_text.children[i].insertAdjacentHTML("beforeend",icon_bnr);
            }
        }
    }

    // Disable option
    for(let i = 0; i < all_option; i++){
        option_text.children[i].classList.add("disabled");
    }

    timer_next();
}

// Tampil jawaban benar
function jawaban_benar(){
    let jwb_benar = data[soal_count].jawaban;
    let all_option = option_text.children.length;
    for(let i = 0; i < all_option; i++){
        if(option_text.children[i].textContent == jwb_benar){
            option_text.children[i].classList.add("border-primary");
            option_text.children[i].insertAdjacentHTML("beforeend",icon_bnr);
        }
    }
}

// Disable option
function disabled_option(){
    let all_option = option_text.children.length;
    for(let i = 0; i < all_option; i++){
        option_text.children[i].classList.add("disabled");
    }
}

// Hapus option
function hapus_option(){
    let all_option = option_text.children.length;
    const option_tag = option_text.querySelectorAll(".option");

    for(let i = 0; i < all_option; i++){
        option_tag[i].remove();
    }
}

// Timer
function startTimer(time){
    counter = setInterval(timer,1000);
    function timer(){
        timecount.textContent = time;
        time--;
        if(time < 9){
            let addzero = timecount.textContent;
            timecount.textContent = "0" + addzero;
        }

        if(time < 0){
            clearInterval(counter);
            timecount.textContent = "00";
            jawaban_benar();
            timer_next();
            disabled_option();
        }
    }
}

// Timer next soal
function timer_next(){
    counter = setInterval(timer,1000);
    let time = 3;
    function timer(){
        time--;
        if(time < 0){
            clearInterval(counter);
            startTimer(timeValue);
            hapus_option();
            next_soal();
        }
        let load_soal_tag = '<i class="fas fa-spinner fa-spin"></i>';
        timecount.innerHTML = load_soal_tag;
        
    }
}

// Next Soal
function next_soal(){
    if(soal_count < data.length - 1){
        soal_count++;
        no_soal++;
        tampil_jml_soal(no_soal);
        tampil_soal(soal_count);
    }else{
        clearInterval(counter);
        // console.log("beres");
        soal.style.display = "none";
        soal_count = 0;
        no_soal = 1;
        btn_start.removeAttribute("hidden","True");
        tampil_result();
        userScore = 0;
    }
}

// Tampil Modal Selesai
function tampil_result(){
    $("#selesaiModal").modal("show");
    const result = document.querySelector(".result");
    const scoreText = result.querySelector(".score-text");
    if(userScore < 1 ){
        let scoreTag = '<span><p><strong>Maaf, </strong>Kamu tidak menjawab dengan benar dari <strong>'+data.length+'</strong> Soal</p></span>';
        scoreText.innerHTML = scoreTag;
    }else if(userScore == data.length){
        let scoreTag = '<span><p><strong>Selamat, </strong>Kamu berhasil menyelesaikan <strong>'+userScore+'</strong> dari <strong>'+data.length+'</strong> Soal</p></span>';
        scoreText.innerHTML = scoreTag;
    }else{
        let scoreTag = '<span><p>Kamu hanya berhasil menyelesaikan <strong>'+userScore+'</strong> dari <strong>'+data.length+'</strong> Soal</p></span>';
        scoreText.innerHTML = scoreTag;
    }
}

// End Quiz