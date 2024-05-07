function setAktif() {
    const preload = document.getElementById('preload').style.display = 'none';
    const bgblur = document.getElementById('blur');
    const content = document.getElementById('content');
    const btn_submit = document.getElementById('submit');
    const judul_utama = document.getElementById('judul_utama');
    const judul = document.getElementById('judul');
    const sub_judul = document.getElementById('sub_judul');
    const link_active = document.getElementById('link_active');
    fetch(
        "https://script.google.com/macros/s/AKfycbzWnRxy6zlD4tlGQUAHJkTUTD0wkrnBi0_A8CnaQkNKToc-zxIdAZSDajbkH3EpaUhf0A/exec"
      )
      .then((response) => response.json())
      .then((data) => {
        // mendefinisikan Variable
        const respon    = data.data;
        let now         = new Date().getDate();
        let status      = respon[3]['status'];
        let pesan       = respon[3]['pesan'].split('-');
        let ex_date     = respon[3]['end'].split('-')[2].slice(0,2) - now;
        ex_date         = (ex_date == 0) ? 1 : ex_date;
        const is_finish = respon[3]['is_finish'];
        let notifikasi = (ex_date == 1) ? 'Hari Ini Adalah Hari Terakhir Trial Sistem Anda' : 'Sisa Trial Anda ' + ex_date + ' Hari Lagi';
        const judulProgram = respon[3]['judul'].replaceAll(' ', '%20');
        const namaKlien = respon[3]['nama_klien'].replaceAll(' ', '%20');
        let link = `https://api.whatsapp.com/send?phone=62885802269603&text=Mohon%20Di%20Bantu%20Memperpanjang%20Masa%20Trial%20${judulProgram}%20Dari%20Klien%20Atas%20Nama%20${namaKlien}%20Yang%20Habis`;
        // eksekusi
        
        if (status == 0) {
          judul_utama.innerHTML = pesan[0];
          judul.innerHTML = pesan[1];
          sub_judul.innerHTML = pesan[2];
          link_active.innerHTML = 'Hubungi Sekarang';
          link_active.setAttribute("href", link);
          link_active.style.display = 'inline';
          bgblur.style.display = 'block';
          content.style.display = 'none';
          btn_submit.style.display = 'none';
        } else {
          (is_finish != 1 && ex_date <= 5) ? alert(notifikasi): ''
          bgblur.style.display = 'none';
          content.style.display = 'block';
          btn_submit.style.display = 'block';
        }
      });

  }

  function preloadAktif() {
    const preload = document.getElementById('preload').style.display = 'block';
    const bgblur = document.getElementById('blur').style.display = 'none';
    const content = document.getElementById('content').style.display = 'none';
  }
  // togle internet on/off
  window.addEventListener("online", function() {
    console.log("I am connected to the internet");
    setAktif()
  })
  window.addEventListener("offline", function() {
    console.log("Disconnected...so sad!!!");
    preloadAktif()
  })
  navigator.onLine == false ? preloadAktif() : setAktif()