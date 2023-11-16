<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Fitur Pada Rent -->
<script>
    $(document).ready(function () {
        // Function to get tomorrow's date
        function getTomorrow() {
            var today = new Date();
            var tomorrow = new Date(today);
            tomorrow.setDate(today.getDate() + 1);
            return tomorrow;
        }

        // Initialize datepicker for Tanggal Mulai
        $("#tanggalMulai").datepicker({
            dateFormat: "yy-mm-dd",
            minDate: getTomorrow(),
            defaultDate: getTomorrow(),
            onSelect: function (selectedDate) {
                var lamaSewa = parseInt($("#lamaSewa").val());
                if (!isNaN(lamaSewa)) {
                    var mulai = new Date(selectedDate);
                    var selesai = new Date(mulai);
                    selesai.setDate(selesai.getDate() + lamaSewa);
                    $("#tanggalSelesai").datepicker("setDate", selesai);
                }
            }
        });

        // Initialize datepicker for Tanggal Selesai
$("#tanggalSelesai").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: getTomorrow(),
    defaultDate: getTomorrow(),
    beforeShow: function (input, inst) {
        return false; // Mencegah datepicker muncul saat input diklik
    }
});


        $("#lamaSewa").change(function () {
            var lamaSewa = parseInt($(this).val());
            if (!isNaN(lamaSewa)) {
                var mulai = $("#tanggalMulai").datepicker("getDate");
                if (mulai !== null) {
                    var selesai = new Date(mulai);
                    selesai.setDate(selesai.getDate() + lamaSewa);
                    $("#tanggalSelesai").datepicker("setDate", selesai);
                }
            }
        });
    });

    function showPopup() {
    const nama = document.querySelector('[name="nama"]').value;
    const telepon = document.querySelector('[name="telepon"]').value;
    const startDate = document.querySelector('#tanggalMulai').value;
    const endDate = document.querySelector('#tanggalSelesai').value;
    const pilihanBusRadio = document.querySelector('[name="pilihan_bus"]:checked');
    const pilihanBus = pilihanBusRadio ? pilihanBusRadio.value : '';
    const hargaBus = pilihanBusRadio ? parseFloat(pilihanBusRadio.dataset.harga) : 0;

    // Hitung harga total
    const totalHarga = lamaSewa * hargaBus;

    // Isi elemen HTML di dalam popup dengan data yang sesuai
    document.getElementById('popup-nama').innerText = nama;
    document.getElementById('popup-telepon').innerText = telepon;
    document.getElementById('popup-startDate').innerText = startDate;
    document.getElementById('popup-endDate').innerText = endDate;
    document.getElementById('popup-pilihanBus').innerText = pilihanBus;
    document.getElementById('popup-totalHarga').innerText = totalHarga;

    // Tampilkan popup
    const rentPopup = document.getElementById('rent-popup');
    rentPopup.style.display = 'block';
    

    
}



</script>

<!-- Fitur Slide -->
<script>
    $(document).ready(function () {
    var currentSlide = 0;
    var totalSlides = $('.col').length;

    function showSlide() {
        $('.col').hide();
        $('.col:eq(' + currentSlide + ')').show();
        toggleArrows();
    }

    function toggleArrows() {
        if (totalSlides <= 1) {
            // If there is only one slide, hide both arrows
            $('#leftArrow, #rightArrow').hide();
        } else {
            $('#leftArrow, #rightArrow').show();
        }
    }

    showSlide();

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide();
    }

    $('#leftArrow').click(function () {
        prevSlide();
    });

    $('#rightArrow').click(function () {
        nextSlide();
    });

    // Adjust the slide and arrow visibility when the window is resized
    $(window).resize(function () {
        totalSlides = $('.col').length;
        showSlide();
    });
});

</script>
</body>



</html>