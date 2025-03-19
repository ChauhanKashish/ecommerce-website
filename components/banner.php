<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Example</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
           
        }
        .banner-container {
           
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
        .banner-slides {
            display: flex;
            transition: transform 1s ease-in-out;
            
        }
        .banner-slide {
            min-width: 100%;
            box-sizing: border-box;
        }
        .banner-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .banner-dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }
        .banner-dot {
            height: 10px;
            width: 10px;
            margin: 0 5px;
            background-color: #fff;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .banner-dot.active {
            background-color: #333;
        }
    </style>
</head>
<body>

    <div class="banner-container">
        <div class="banner-slides">
            <div class="banner-slide"><img src="image/medicines.jpg" alt="Slide 1"></div>
            <div class="banner-slide"><img src="image/img1.jpg" alt="Slide 2"></div>
            <div class="banner-slide"><img src="image/img2.jpg" alt="Slide 3"></div>
            <div class="banner-slide"><img src="image/img3.jpg" alt="Slide 4"></div>
            <div class="banner-slide"><img src="image/img4.jpg" alt="Slide 5"></div>
        </div>
        <div class="banner-dots">
            <div class="banner-dot active"></div>
            <div class="banner-dot"></div>
            <div class="banner-dot"></div>
            <div class="banner-dot"></div>
            <div class="banner-dot"></div>
        </div>
    </div>

    <script>
        const slides = document.querySelector('.banner-slides');
        const dots = document.querySelectorAll('.banner-dot');
        let index = 0;

        function showSlide(n) {
            if (n >= dots.length) index = 0;
            if (n < 0) index = dots.length - 1;
            slides.style.transform = `translateX(${-index * 100}%)`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
        }

        function nextSlide() {
            index++;
            showSlide(index);
        }

        function prevSlide() {
            index--;
            showSlide(index);
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                index = i;
                showSlide(index);
            });
        });

        setInterval(nextSlide, 5000);
    </script>

</body>
</html>
