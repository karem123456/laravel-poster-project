@extends('layout/app')

@section('title' , 'about')

@section('content')

<style>
    .about-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }
    .about-section h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    .about-section p {
        font-size: 1.2rem;
    }
    .skills {
        margin-top: 30px;
    }
    .skills h3 {
        font-size: 1.8rem;
        margin-bottom: 15px;
    }
    .skills ul {
        list-style-type: none;
        padding: 0;
    }
    .skills ul li {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<div class="container about-section text-center">
    <h2>About Me</h2>
    <p>Hello! I'm the creator of this page. I have a strong background in web development and a passion for creating dynamic and responsive websites. My expertise lies in PHP, Laravel, and MySQL, and I have a solid understanding of HTML, CSS, and basic JavaScript.</p>
    
    <div class="skills">
        <h3>My Skills</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">HTML</li>
            <li class="list-group-item">CSS</li>
            <li class="list-group-item">JavaScript (Basics)</li>
            <li class="list-group-item">PHP (Master)</li>
            <li class="list-group-item">Laravel (Master)</li>
            <li class="list-group-item">MySQL (Master)</li>
        </ul>
    </div>
</div
@endsection