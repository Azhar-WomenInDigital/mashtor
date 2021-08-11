@extends('frontend.layouts.master')
@section('title',' | Mashtor  Alumni ')
@section('frontend-styles')
<style>
    .bg-gray{
        background: #F1F1F1;
    }
    .graduated i{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 85px;
        width: 85px;
        font-size: 30px;
        border-radius: 50%;
        border: 4px solid black;
    }
    .alumni-cat a{
        border-right: 2px solid black;
        line-height: 15px;
        padding-left: 6px;
        padding-right: 6px;
        text-decoration: none;
        font-family: AvenirNextLTPro-Medium;
    }
    .alumni-cat a:last-child{
        border-right: none;
    }
    /*  */
    .card{
        /* box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); */
        margin-bottom: 30px;
    }
    .des{
        padding: 20px;
        height: 180px;
    }
    .students-des{
        height: auto;
    }
    .des p{
        font-size: 15px;
    }
    .des h5{
        font-size: 17px;
    }
    .card img{
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .projects-card .des {
        height: auto
    }
    .heading-font{
        font-family:  AvenirNextLTPro-Medium;
    }
    .students-card h5{
        text-transform: capitalize !important;
    }
    @media only screen and (min-width: 768px) and (max-width: 991.98px) {
        .des {
            height: 190px;
        }
        .des p{
            font-size: 14px;
        }
        .students-des{
            height: 190px;
        }
        .bg-gray h4{
            font-size: 17px;
        }
        .alumni-cat a {
            font-size: 13px;
        }
    }
    @media only screen and (min-width: 577px) and (max-width: 767.98px) {
        .bg-gray h4{
            font-size: 17px;
        }
        .alumni-cat a {
            font-size: 13px;
        }
        .students-des{
            height: 190px;
        }
    }
    @media only screen and (min-width: 320px) and (max-width: 576px) {
        .des {
        height: auto;
        }
        .des p{
        font-size: 14px;
        }
        .bg-gray h4{
            font-size: 15px;
        }
        .alumni-cat a {
            font-size: 12px;
        }
    }
</style>
@endsection
@section('frontend-content')
    <section >
        <div class="bg-gray d-flex justify-content-center align-items-center flex-column  py-5 text-center">
            <span class="graduated">
                <i class="fas fa-graduation-cap"></i>
            </span>
            <h2 class="pt-3">Mashtor's Alumni</h2>
            <h4 class="pt-3" style="font-family: AvenirNextLTPro-Medium;">List Of Students who have successfully graduated from mashtor online courses</h4>
            <h4 class="pb-3" style="font-family: AvenirNextLTPro-Medium;">Powred by women in digital, ordered by graduation date</h4>

            <div class="d-flex alumni-cat">
                <a href="#">All Mashtor's Alumni</a>
                <a href="#">Work Shop Alumni</a>
                <a href="#">Alumni Projects</a>
                <a href="#">Alumni Review</a>
            </div>
        </div>
        <h3 class="pt-4 text-center heading-font">Development in Progress...</h3>
        <!-- Students -->
        <div class="container mt-5">
            <div class="row">
                @foreach($students as $student)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 load-col">
                    <div class="card students-card">
                        <img src="{{ url($student->image) }}" alt="" class="img-fluid">
                        <div class="des students-des">
                        <h5 class="pb-2">{{$student->fullname}}</h5>
                        <div class="d-flex pt-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <div class="d-flex pt-2 rating">
                            <span>5</span>
                            <span>/</span>
                            <span>5</span>
                            <span>-High Recommended</span>
                        </div>
                        <p>Graduated 1 Day Ago</p>
                        <a href="#" class="text-info">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ml-3">{{ $students->links() }}</div>
        </div>
        <!-- Students End -->
    </section>
@endsection
@section('frontend-scripts')
@endsection