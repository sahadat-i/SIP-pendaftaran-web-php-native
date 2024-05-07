<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: #FFFFFF;
    transition: 1s ease;
    font-family: 'Ysabeau SC', sans-serif;
    height: 100vh;
    color: #fff;
}
h1{
    font-size: 1.5rem;
}
.ring{
    width: 200px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}
.ring::before{
    content: '';
    width: 200px;
    height: 200px;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 50%;
    animation: ring 2s linear infinite;
}
@keyframes ring {
    0%{
        transform: rotate(0deg);
        box-shadow: 0px 5px 5px #ff2121;
    }
    25%{
        transform: rotate(90deg);
        box-shadow: 0px 5px 5px #fffb21;
    }
    50%{
        transform: rotate(180deg);
        box-shadow: 0px 5px 5px #21c0ff;
    }
    75% {
        transform: rotate(270deg);
        box-shadow: 0px 5px 5px #bc21ff;
    }
    100% {
        transform: rotate(360deg);
        box-shadow: 0px 5px 5px #ff2121;
    }
}

</style>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="ring" style="margin-left:40%;margin-top:14%">
                <h1 style="color: #14789f;">Oops... <br> No Internet !!!</h1>
            </div>
            <h5 style="margin-top:10px;" class="text-white">
                Warning ...!!!<br>
                Komputer Tidak Terhubung<br>
                <span style="font-size: 12px;">Pastikan komputer Anda memiliki koneksi Internet Aktif untuk memaksimalkan fitur di Program ini</span>
            </h5>
        </div>
    </div>
</div>
