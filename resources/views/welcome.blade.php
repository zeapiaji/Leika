{{-- 
@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/dasbor') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
</div>
@endif --}}
@extends('layouts.app')
@section('landing_page')
<div>

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="uil-search"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
            
                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-inline-block language-switch">
                    <button type="button" class="btn header-item waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
            
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-apps"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="px-lg-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/github.png" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/slack.png" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="uil-minus-path"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-bell"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-16"> Notifications </h5>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> Mark all as read</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="javascript:void(0);" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-xs">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="uil-shopping-basket"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your order is placed</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">James Lemire</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">It will seem like simplified English.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hour ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-xs">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="uil-truck"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your item is shipped</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Salena Layfield</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="uil-arrow-circle-right me-1"></i> View More..
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-4.jpg"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Marcus</span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">My Wallet</span></a>
                        <a class="dropdown-item d-block" href="#"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Settings</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Lock screen</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="uil-cog"></i>
                    </button>
                </div>
    
            </div>
        </div>
    </header>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom">
                            <h5 class="mb-0">Filters</h5>
                        </div>

                        <div class="p-4">
                            <h5 class="font-size-14 mb-3">Categories</h5>
                            <div class="custom-accordion">
                                <a class="text-body fw-semibold pb-2 d-block" data-bs-toggle="collapse" href="#categories-collapse" role="button" aria-expanded="false" aria-controls="categories-collapse">
                                    <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i> Footwear
                                </a>
                                <div class="collapse show" id="categories-collapse">
                                    <div class="card p-2 border shadow-none">
                                        <ul class="list-unstyled categories-list mb-0">
                                            <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Formal Shoes</a></li>
                                            <li class="active"><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Sports Shoes</a></li>
                                            <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> casual Shoes</a></li>
                                            <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Sandals</a></li>
                                            <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Slippers</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="p-4 border-top">
                            <div>
                                <h5 class="font-size-14 mb-4">Price</h5>

                                <input type="text" id="pricerange">
                            </div>
                        </div>

                        <div class="custom-accordion">
                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-14 mb-0"><a href="#filtersizes-collapse" class="text-dark d-block" data-bs-toggle="collapse">Sizes <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse show" id="filtersizes-collapse">
                                        <div class="mt-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-15 mb-0">Select Sizes</h5>
                                                </div>
                                                <div class="w-xs">
                                                    <select class="form-select">
                                                        <option value="1">3</option>
                                                        <option value="2">4</option>
                                                        <option value="3">5</option>
                                                        <option value="4">6</option>
                                                        <option value="5" selected>7</option>
                                                        <option value="6">8</option>
                                                        <option value="7">9</option>
                                                        <option value="8">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-14 mb-0"><a href="#filterprodductcolor-collapse" class="text-dark d-block" data-bs-toggle="collapse">Colors <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse show" id="filterprodductcolor-collapse">
                                        <div class="mt-4">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck1">
                                                <label class="form-check-label" for="productcolorCheck1"><i class="mdi mdi-circle text-dark mx-1"></i> Black</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck2">
                                                <label class="form-check-label" for="productcolorCheck2"><i class="mdi mdi-circle text-light mx-1"></i> White</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck3">
                                                <label class="form-check-label" for="productcolorCheck3"><i class="mdi mdi-circle text-secondary mx-1"></i> Gray</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck4">
                                                <label class="form-check-label" for="productcolorCheck4"><i class="mdi mdi-circle text-primary mx-1"></i> Blue</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck5">
                                                <label class="form-check-label" for="productcolorCheck5"><i class="mdi mdi-circle text-success mx-1"></i> Green</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck6">
                                                <label class="form-check-label" for="productcolorCheck6"><i class="mdi mdi-circle text-danger mx-1"></i> Red</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck7">
                                                <label class="form-check-label" for="productcolorCheck7"><i class="mdi mdi-circle text-warning mx-1"></i> Yellow</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck8">
                                                <label class="form-check-label" for="productcolorCheck8"><i class="mdi mdi-circle text-purple mx-1"></i> Purple</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-14 mb-0"><a href="#filterproduct-color-collapse" class="text-dark d-block" data-bs-toggle="collapse">Customer Rating <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse show" id="filterproduct-color-collapse">
                                        <div class="mt-4">
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio1" name="productratingRadio1" class="form-check-input">
                                                <label class="form-check-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio2" name="productratingRadio1" class="form-check-input">
                                                <label class="form-check-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio3" name="productratingRadio1" class="form-check-input">
                                                <label class="form-check-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productratingRadio4" name="productratingRadio1" class="form-check-input">
                                                <label class="form-check-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-14 mb-0"><a href="#filterproduct-discount-collapse" class="collapsed text-dark d-block" data-bs-toggle="collapse">Discount <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse" id="filterproduct-discount-collapse">
                                        <div class="mt-4">
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio1" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio1">50% or more</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio2" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio2">40% or more</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio3" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio3">30% or more</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio4" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio4">20% or more</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio5" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio5">10% or more</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="productdiscountRadio6" name="productdiscountRadio" class="form-check-input">
                                                <label class="form-check-label" for="productdiscountRadio6">Less than 10%</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>Showing result for "Shoes"</h5>
                                            <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Footwear</a></li>
                                                <li class="breadcrumb-item active">Shoes</li>
                                            </ol>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-inline float-md-end">
                                            <div class="search-box ms-2">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                    <i class="mdi mdi-magnify search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>


                                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                                    <li class="nav-item">
                                        <a class="nav-link disabled fw-medium" href="#" tabindex="-1" aria-disabled="true">Sort by:</a>
                                      </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Popularity</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Newest</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Discount</a>
                                    </li>
                                    
                                </ul>

                                <div class="row">
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">
                                                <div class="product-ribbon badge bg-warning">
                                                    Trending
                                                </div>
                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Nike N012 Shoes</a></h5>
                                                <p class="text-muted font-size-13">Gray, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$280</del></span> $260</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-dark"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-light"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-primary"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">
                                                <div class="product-ribbon badge bg-danger">
                                                    - 20 %
                                                </div>
                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-2.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Adidas Running Shoes</a></h5>
                                                <p class="text-muted font-size-13">Black, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$250</del></span> $240</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-danger"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-dark"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-light"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">
                                                
                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-3.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Puma P103 Shoes</a></h5>
                                                <p class="text-muted font-size-13">Purple, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$260</del></span> $250</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-purple"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-light"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-dark"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">
                                               
                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-4.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Sports S120 Shoes</a></h5>
                                                <p class="text-muted font-size-13">Cyan, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$240</del></span> $230</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-info"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-success"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">

                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-5.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Adidas AB23 Shoes</a></h5>
                                                <p class="text-muted font-size-13">Blue, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$240</del></span> $250</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-dark"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-light"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-primary"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="product-box">
                                            <div class="product-img pt-4 px-4">
                                                <div class="product-ribbon badge bg-danger">
                                                    - 20 %
                                                </div>
                                                <div class="product-wishlist">
                                                    <a href="#">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </div>
                                                <img src="assets/images/product/img-6.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            
                                            <div class="text-center product-content p-4">
                                                
                                                <h5 class="mb-1"><a href="#" class="text-dark">Nike N012 Shoes</a></h5>
                                                <p class="text-muted font-size-13">Gray, Shoes</p>

                                                <h5 class="mt-3 mb-0"><span class="text-muted me-2"><del>$270</del></span> $260</h5>
                                                
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <li class="list-inline-item">
                                                        Colors :
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-dark"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-circle text-light"></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <div>
                                            <p class="mb-sm-0">Page 2 of 84</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="float-sm-end">
                                            <ul class="pagination pagination-rounded mb-sm-0">
                                                <li class="page-item disabled">
                                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">4</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>

</div>
        
@endsection