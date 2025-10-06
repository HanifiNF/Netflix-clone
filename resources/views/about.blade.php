<!-- edit.blade.php -->
@extends('layouts.nav')

@section('content')
    <div class="container mt-5 text-white text-justify">
            <header class="text-center mb-5">
                <h1 class="display-4">Welcome to Vidlix</h1>
                <p class="lead">Your Favorite Streaming Website</p>
            </header>

            <section id="overview" class="mb-5">
                <h2>Overview</h2>
                <p>Vidlix is your favorite streaming website, designed to provide an exceptional and immersive viewing experience. With a vast and diverse library of movies, TV shows, documentaries, and exclusive content, Vidlix caters to all your entertainment needs. Whether you're into the latest blockbusters, timeless classics, or hidden gems, Vidlix ensures you'll always find something to enjoy. Our platform is built to offer seamless navigation and personalized recommendations, making it your go-to destination for endless entertainment.</p>
            </section>

            <section id="frontend" class="mb-5">
                <h2>Frontend Technology</h2>
                <p>The front end of Vidlix is crafted using the latest web development technologies to ensure a smooth and visually appealing user experience. We have utilized <strong>Bootstrap</strong> for responsive and mobile-first design, allowing our site to look great on any device, from desktops to smartphones. Additionally, <strong>jQuery</strong> is employed to create dynamic and interactive user interfaces, enhancing the overall usability of the site. These technologies combined create a modern, sleek, and user-friendly interface that our users love.</p>
            </section>

            <section id="backend" class="mb-5">
                <h2>Backend Technology</h2>
                <p>At the core of Vidlix's functionality is a robust backend built with <strong>Laravel</strong>, a powerful PHP framework known for its elegance and simplicity. Laravel provides the foundation for our website’s architecture, ensuring efficient and secure data management, user authentication, and content delivery. Its modular packaging system allows for easy integration and scalability, ensuring that Vidlix can grow and adapt to meet the demands of our users.</p>
            </section>

            <section id="database" class="mb-5">
                <h2>Database Management</h2>
                <p>Our data is securely stored and managed using <strong>MySQL</strong>, a reliable and high-performance relational database management system. MySQL is essential for handling the extensive data that Vidlix processes, from user profiles and viewing histories to our vast catalog of streaming content. This ensures quick data retrieval, seamless streaming, and an overall responsive user experience.</p>
            </section>

            <section id="creators" class="mb-5">
                <h2>The Creators</h2>
                <p>Vidlix is the brainchild of two talented students, <strong>Hanifi Abrar Setiawan</strong> and <strong>Muhammad Fadhlan Ashila Harashta</strong>. Their dedication and hard work brought Vidlix to life as part of their final project for the "Web Based Programming" course. Their expertise in web development, coupled with a passion for creating an outstanding streaming platform, has culminated in a website that stands out in the crowded world of online streaming services.</p>
            </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
