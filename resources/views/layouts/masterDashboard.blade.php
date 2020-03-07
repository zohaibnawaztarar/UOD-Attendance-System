<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('/images/favicon-96x96.png')}}" sizes="96x96">
    <link href="{{ URL::to('/css/jquery.dataTables.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/dashboardStyles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/main.css') }}">

    <link href="{{ asset('/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/semantic-ui/semantic.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand-lg navbar-dark fixed-top" id="mainn=Nav" style="background-color: #4365e2;">

    <a class="navbar-brand" href="{{url::to('/')}}" class="header__logo header__icon" aria-label="university of dundee logo and link to home page">

    <svg xmlns="http://www.w3.org/2000/svg" width="149" height="50" viewBox="0 0 741 248" aria-labelledby="logo-title">
        <title id="logo-title">University of Dundee logo</title>
        <g stroke="none">
            <path d="M0 7C0 7 0 35.0436364 0 123.994545 0 214.698182 88.5 248 88.5 248 88.5 248 177 214.698182 177 123.994545 177 35.0436364 177 7 177 7L0 7zM138.883663 53.0090909C141.074257 49.0654545 145.455446 45.56 150.274752 46.4363636 151.589109 46.8745455 152.903465 47.3127273 153.779703 48.1890909 153.341584 46.4363636 153.779703 44.6836364 154.655941 43.3690909 154.655941 43.3690909 157.284653 38.5490909 165.170792 38.1109091 165.170792 38.1109091 165.170792 38.1109091 165.170792 38.1109091 165.170792 38.1109091 165.170792 38.5490909 165.170792 38.5490909L148.084158 68.3454545C148.084158 68.3454545 147.64604 68.3454545 147.64604 68.3454545 147.64604 68.3454545 147.64604 68.3454545 147.64604 68.3454545 145.455446 67.0309091 145.017327 63.9636364 146.331683 61.7727273 146.769802 60.8963636 147.207921 60.4581818 148.084158 60.02 146.331683 59.5818182 142.388614 58.7054545 139.321782 53.4472727 138.883663 53.4472727 138.883663 53.4472727 138.883663 53.0090909zM145.017327 73.1654545L138.883663 84.12C123.549505 75.3563636 106.024752 70.5363636 88.5 70.5363636 70.5371287 70.5363636 53.450495 75.3563636 38.1163366 84.12L31.9826733 73.1654545C49.0693069 63.0872727 68.7846535 57.8290909 88.9381188 57.8290909 109.091584 57.8290909 127.930693 63.5254545 145.017327 73.1654545zM110.405941 40.3018182L111.720297 35.92C112.158416 35.0436364 113.034653 34.6054545 113.910891 34.6054545L120.920792 36.3581818 122.673267 29.3472727C123.111386 28.4709091 123.987624 28.0327273 124.863861 28.0327273L129.24505 29.3472727C130.121287 29.7854545 130.559406 30.6618182 130.559406 31.5381818L128.806931 38.5490909 135.816832 40.3018182C136.693069 40.74 137.131188 41.6163636 137.131188 42.4927273L135.816832 46.8745455C135.378713 47.7509091 134.502475 48.1890909 133.626238 48.1890909L126.616337 46.4363636 123.987624 55.6381818C123.549505 56.5145455 122.673267 56.9527273 121.79703 56.9527273L117.415842 55.6381818C116.539604 55.2 116.101485 54.3236364 116.101485 53.4472727L118.730198 44.2454545 111.720297 42.4927273C110.405941 42.4927273 109.967822 41.6163636 110.405941 40.3018182zM79.299505 32.4145455C80.6138614 31.9763636 81.9282178 31.9763636 83.2425743 32.4145455 81.9282178 31.1 81.490099 29.3472727 81.490099 27.5945455 81.490099 27.5945455 81.0519802 21.8981818 88.0618812 17.5163636 88.0618812 17.5163636 88.5 17.5163636 88.5 17.5163636 95.509901 21.8981818 95.0717822 27.5945455 95.0717822 27.5945455 95.0717822 29.3472727 94.1955446 31.1 93.3193069 32.4145455 94.6336634 31.9763636 95.9480198 31.9763636 97.2623762 32.4145455 101.643564 34.1672727 103.834158 39.4254545 103.834158 43.8072727 103.834158 43.8072727 103.834158 44.2454545 103.39604 44.2454545 98.1386139 47.3127273 94.1955446 45.9981818 92.4430693 45.56 92.8811881 46.4363636 92.8811881 46.8745455 92.8811881 47.7509091 92.8811881 50.38 90.6905941 52.5709091 88.0618812 52.5709091 85.4331683 52.5709091 83.2425743 50.38 83.2425743 47.7509091 83.2425743 46.8745455 83.2425743 46.4363636 83.6806931 45.56 81.9282178 46.4363636 77.9851485 47.3127273 72.7277228 44.2454545 72.7277228 44.2454545 72.289604 43.8072727 72.289604 43.8072727 72.7277228 39.4254545 74.9183168 34.1672727 79.299505 32.4145455zM42.0594059 40.74L49.0693069 38.9872727 47.3168317 31.9763636C46.8787129 31.1 47.7549505 30.2236364 48.6311881 29.7854545L53.0123762 28.4709091C53.8886139 28.0327273 54.7648515 28.9090909 55.2029703 29.7854545L56.9554455 36.7963636 63.9653465 35.0436364C64.8415842 34.6054545 65.7178218 35.4818182 66.1559406 36.3581818L67.470297 40.74C67.9084158 41.6163636 67.0321782 42.4927273 66.1559406 42.9309091L59.1460396 44.6836364 61.7747525 53.8854545C62.2128713 54.7618182 61.3366337 55.6381818 60.460396 56.0763636L56.0792079 57.3909091C55.2029703 57.8290909 54.3267327 56.9527273 53.8886139 56.0763636L51.259901 46.8745455 43.8118812 48.1890909C42.9356436 48.6272727 42.0594059 47.7509091 41.6212871 46.8745455L40.3069307 42.4927273C40.3069307 42.0545455 41.1831683 41.1781818 42.0594059 40.74zM11.3910891 38.1109091C11.8292079 38.1109091 11.8292079 38.1109091 11.3910891 38.1109091 19.7153465 38.5490909 22.3440594 43.3690909 22.3440594 43.3690909 23.220297 44.6836364 23.6584158 46.8745455 23.220297 48.1890909 24.0965347 47.3127273 25.4108911 46.4363636 26.7252475 46.4363636 31.5445545 45.56 35.9257426 49.0654545 38.1163366 53.0090909 38.1163366 53.0090909 38.1163366 53.4472727 38.1163366 53.4472727 35.049505 58.7054545 31.1064356 60.02 29.3539604 60.02 30.230198 60.4581818 30.6683168 60.8963636 31.1064356 61.7727273 32.4207921 63.9636364 31.5445545 67.0309091 29.7920792 68.3454545 29.7920792 68.3454545 29.7920792 68.3454545 29.7920792 68.3454545 29.7920792 68.3454545 29.3539604 68.3454545 29.3539604 68.3454545L11.3910891 38.1109091C11.3910891 38.1109091 11.3910891 38.1109091 11.3910891 38.1109091zM143.264851 202.867273C139.321782 207.687273 134.940594 212.069091 130.121287 216.450909 112.158416 232.663636 93.7574257 240.989091 88.5 243.18 83.2425743 240.989091 65.279703 232.663636 47.3168317 216.450909 42.4975248 212.069091 37.6782178 207.249091 33.7351485 202.867273L88.5 160.801818 4.38118812 95.9509091 172.618812 95.9509091 88.5 160.801818 143.264851 202.867273zM715.421007 140.161111C722.877723 140.161111 727.264026 144.988889 728.141286 152.45L701.384837 152.45C703.139358 144.55 708.402922 140.161111 715.421007 140.161111zM715.859638 130.066667C700.068946 130.066667 689.103188 141.916667 689.103188 159.033333 689.103188 177.027778 700.507576 188 715.859638 188 726.825395 188 736.036632 181.416667 738.668414 173.516667L729.018547 168.25C726.825395 174.833333 721.561832 177.466667 715.859638 177.466667 707.964292 177.466667 701.823467 171.761111 700.946207 160.788889L739.984305 160.788889 739.984305 157.716667C740.422935 141.916667 731.650329 130.066667 715.859638 130.066667zM657.521806 140.161111C664.978521 140.161111 669.364824 144.988889 670.242085 152.45L643.485635 152.45C644.801526 144.55 650.06509 140.161111 657.521806 140.161111zM657.960436 130.066667C642.169744 130.066667 631.203987 141.916667 631.203987 159.033333 631.203987 177.027778 642.608375 188 657.960436 188 668.926194 188 678.13743 181.416667 680.769212 173.516667L671.119345 168.25C668.926194 174.833333 663.66263 177.466667 657.960436 177.466667 650.06509 177.466667 643.924266 171.761111 643.047005 160.788889L682.085103 160.788889 682.085103 157.716667C682.085103 141.916667 673.312497 130.066667 657.960436 130.066667zM594.35904 177.027778C585.586434 177.027778 579.88424 170.444444 579.88424 158.594444 579.88424 146.744444 585.586434 140.161111 594.35904 140.161111 602.693016 140.161111 608.83384 145.427778 609.711101 155.522222L609.711101 160.788889C608.83384 171.761111 602.693016 177.027778 594.35904 177.027778zM609.711101 110.755556L609.711101 137.966667 608.83384 137.966667C605.763428 133.138889 600.499864 130.066667 592.165888 130.066667 579.006979 130.066667 567.602591 141.038889 567.602591 159.033333 567.602591 177.027778 579.006979 188 592.165888 188 600.499864 188 605.763428 184.488889 608.83384 180.1L609.711101 180.1 609.711101 187.122222 621.55412 187.122222 621.55412 109 609.711101 110.755556zM539.09162 130.066667C531.634905 130.066667 525.49408 134.016667 522.862299 138.405556L521.985038 138.405556 521.546408 131.383333 510.58065 131.383333 510.58065 186.244444 522.423668 186.244444 522.423668 158.155556C522.423668 152.011111 523.739559 148.061111 525.932711 145.427778 528.564493 142.355556 532.512166 140.6 536.459838 140.6 543.477923 140.6 546.986966 144.111111 546.986966 153.766667L546.986966 186.244444 558.829984 186.244444 558.829984 149.816667C558.391354 134.894444 549.618748 130.066667 539.09162 130.066667zM485.578722 131.383333L485.578722 159.911111C485.578722 166.055556 484.262831 170.005556 482.069679 172.638889 479.437897 175.711111 475.490224 177.466667 471.542552 177.466667 464.524467 177.466667 461.015424 173.955556 461.015424 164.3L461.015424 131.822222 449.172405 131.822222 449.172405 168.25C449.172405 183.172222 458.383642 188 468.472139 188 475.928855 188 482.069679 184.05 484.701461 179.661111L485.578722 179.661111 486.017352 186.683333 496.98311 186.683333 496.98311 131.383333 485.578722 131.383333zM390.395943 125.238889L400.04581 125.238889C419.784174 125.238889 426.363629 134.016667 426.363629 150.255556 426.363629 166.933333 419.345544 175.711111 400.04581 175.711111L390.395943 175.711111 390.395943 125.238889zM400.48444 114.705556L378.114294 114.705556 378.114294 186.683333 400.48444 186.683333C427.24089 186.683333 439.083908 172.638889 439.083908 150.255556 439.083908 128.311111 427.24089 114.705556 400.48444 114.705556zM345.655651 123.044444C347.848803 123.044444 350.480584 123.483333 352.235106 123.922222L352.235106 113.827778C350.041954 113.388889 347.848803 112.95 344.77839 112.95 335.567154 112.95 325.478656 117.338889 325.478656 132.7L325.478656 134.894444 317.14468 134.894444 317.14468 144.111111 325.478656 144.111111 325.478656 186.683333 336.444414 186.683333 336.444414 144.111111 350.041954 144.111111 350.041954 134.894444 336.444414 134.894444 336.444414 134.016667C336.444414 126.116667 339.953457 123.044444 345.655651 123.044444zM300.476728 160.35C300.476728 171.322222 295.213165 177.905556 286.440558 177.905556 277.667952 177.905556 272.404388 171.322222 272.404388 160.35 272.404388 149.377778 277.667952 142.794444 286.440558 142.794444 295.213165 142.794444 300.476728 149.377778 300.476728 160.35zM311.881117 160.35C311.881117 143.672222 301.792619 133.138889 286.440558 133.138889 271.527128 133.138889 261 143.672222 261 160.35 261 177.027778 271.527128 187.561111 286.440558 187.561111 301.353989 187.561111 311.881117 177.027778 311.881117 160.35zM741 24.2290749L728.721101 24.2290749 714.249541 66.5198238 700.216514 24.2290749 686.622018 24.2290749 707.67156 79.7356828 700.216514 100 712.495413 100 737.053211 35.2422907 741 24.2290749zM669.080734 57.7092511L669.080734 33.4801762 682.675229 33.4801762 682.675229 23.7885463 669.080734 23.7885463 669.080734 8.37004405 657.240367 9.69162996 657.240367 23.3480176 650.223853 23.3480176 650.223853 33.0396476 657.240367 33.0396476 657.240367 58.1497797C657.240367 74.4493392 667.765138 79.2951542 677.412844 79.2951542 680.921101 79.2951542 683.113761 78.8546256 685.306422 78.4140969L685.306422 67.4008811C683.552294 67.8414097 680.921101 68.2819383 678.72844 68.2819383 672.150459 69.1629956 669.080734 65.6387665 669.080734 57.7092511zM640.137615 24.2290749L628.297248 24.2290749 628.297248 79.2951542 640.137615 79.2951542 640.137615 24.2290749zM641.891743 7.48898678C641.891743 3.08370044 638.383486 0 634.436697 0 630.051376 0 626.981651 3.08370044 626.981651 7.48898678 626.981651 11.8942731 630.489908 14.9779736 634.436697 14.9779736 638.822018 14.9779736 641.891743 11.8942731 641.891743 7.48898678zM579.181651 61.6740088L573.042202 69.6035242C576.988991 75.3303965 584.005505 80.1762115 595.407339 80.1762115 608.124771 80.1762115 616.895413 73.1277533 616.895413 62.5550661 616.895413 52.4229075 608.563303 48.4581498 598.915596 45.814978 592.337615 44.0528634 587.075229 42.7312775 587.075229 37.8854626 587.075229 34.8017621 590.144954 32.1585903 595.407339 32.1585903 601.546789 32.1585903 607.247706 35.6828194 610.317431 39.2070485L616.018349 30.8370044C611.194495 25.5506608 604.177982 22.0264317 595.407339 22.0264317 583.12844 22.0264317 574.79633 28.1938326 574.79633 38.3259912 574.79633 48.8986784 583.12844 52.4229075 593.653211 55.0660793 601.108257 56.8281938 605.055046 59.030837 605.055046 63.4361233 605.055046 67.4008811 601.546789 70.0440529 595.407339 70.0440529 587.952294 70.4845815 581.812844 66.0792952 579.181651 61.6740088zM565.148624 22.4669604C559.009174 22.4669604 553.308257 26.4317181 550.677064 32.1585903L549.8 32.1585903 549.361468 23.7885463 538.398165 23.7885463 538.398165 78.8546256 550.238532 78.8546256 550.238532 48.0176211C550.238532 38.3259912 555.93945 33.4801762 563.394495 33.4801762 565.587156 33.4801762 566.902752 33.9207048 567.779817 34.3612335L568.656881 22.907489C568.218349 22.907489 566.902752 22.4669604 565.148624 22.4669604zM502.438532 32.5991189C509.893578 32.5991189 514.278899 37.4449339 515.155963 44.9339207L488.405505 44.9339207C489.721101 37.0044053 494.983486 32.5991189 502.438532 32.5991189zM502.877064 22.4669604C487.089908 22.4669604 476.126606 34.3612335 476.126606 51.5418502 476.126606 69.6035242 487.52844 80.6167401 502.877064 80.6167401 513.840367 80.6167401 523.049541 74.0088106 525.680734 66.0792952L516.033028 60.7929515C513.840367 67.4008811 508.577982 70.0440529 502.877064 70.0440529 494.983486 70.0440529 488.844037 64.3171806 487.966972 53.3039648L526.99633 53.3039648 526.99633 50.2202643C526.99633 34.8017621 518.225688 22.4669604 502.877064 22.4669604zM459.900917 24.2290749L445.429358 66.5198238 431.39633 24.2290749 417.801835 24.2290749 438.412844 79.2951542 451.130275 79.2951542 471.741284 24.2290749 459.900917 24.2290749zM409.031193 24.2290749L397.190826 24.2290749 397.190826 79.2951542 409.031193 79.2951542 409.031193 24.2290749zM410.785321 7.48898678C410.785321 3.08370044 407.277064 0 403.330275 0 398.944954 0 395.875229 3.08370044 395.875229 7.48898678 395.875229 11.8942731 399.383486 14.9779736 403.330275 14.9779736 407.277064 14.9779736 410.785321 11.8942731 410.785321 7.48898678zM363.423853 22.4669604C355.968807 22.4669604 349.829358 26.4317181 347.198165 30.8370044L346.321101 30.8370044 345.882569 23.7885463 334.919266 23.7885463 334.919266 78.8546256 346.759633 78.8546256 346.759633 50.2202643C346.759633 44.0528634 348.075229 40.0881057 350.26789 37.4449339 352.899083 34.3612335 356.845872 32.5991189 360.792661 32.5991189 367.809174 32.5991189 371.317431 36.123348 371.317431 45.814978L371.317431 78.4140969 383.157798 78.4140969 383.157798 41.8502203C382.719266 27.753304 373.948624 22.4669604 363.423853 22.4669604zM275.278899 49.7797357L275.278899 7.04845815 263 7.04845815 263 49.7797357C263 69.6035242 272.209174 81.0572687 291.943119 81.0572687 311.238532 81.0572687 320.886239 69.6035242 320.886239 49.7797357L320.886239 7.04845815 308.168807 7.04845815 308.168807 49.7797357C308.168807 63.4361233 303.783486 70.0440529 291.943119 70.0440529 280.102752 70.0440529 275.278899 62.9955947 275.278899 49.7797357z"></path>
        </g>
    </svg>
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-groupSearch">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    {{--<div class="sb-sidenav-menu-heading">-</div>--}}
                    <br>
                    <a class="nav-link" href="{{ route('dashboard') }}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard</a
                    >
                    <br>
                    {{--<div class="sb-sidenav-menu-heading">-</div>--}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchool" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                        School Office
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseSchool" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('addSchoolStaff') }}">Add School Admin</a>
                            <a class="nav-link" href="{{ route('systemAdmin') }}">Delete School Admin</a></nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLecturer" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        Teaching Staff
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseLecturer" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('addLecturer') }}">Add Lecturers</a>
                            <a class="nav-link" href="{{ route('deleteLecturers') }}">Delete Lecturers</a></nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseModules" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Modules
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseModules" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('addModule') }}">Add Modules</a>
                            <a class="nav-link" href="{{ route('deleteModule') }}">Delete Modules</a></nav>
                    </div>


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                        Locations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseLocation" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('addLocation') }}">Add Locations</a>
                            <a class="nav-link" href="{{ route('deleteLocation') }}">Delete Locations</a></nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLecturers" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Lecturers
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseLecturers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('lecturers', ['teach_id' => Auth::user()->id]) }}">Start Sessions</a>
                            <a class="nav-link" href="{{ route('addSession') }}">Add Sessions</a>
                            <a class="nav-link" href="{{ route('deleteSession') }}">Delete Sessions</a>
                            <a class="nav-link" href="{{ route('moduleEnrolment') }}">Enrol Students</a>
                            <a class="nav-link" href="{{ route('disenrollStudents') }}">Disenroll Students</a>
                            <a class="nav-link" href="{{ route('attendanceReports') }}">Attendance Reports</a>
                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudents" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Student
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseStudents" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('students') }}">Sign Attendance</a>

                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Settings
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('changePassword') }}">Change Password</a>
                            <a class="nav-link" href="{{ route('settings') }}">Restrict IPs</a>

                    </div>

                    <a class="nav-link" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                        Logout
                    </a>







                    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                    --}}<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                            >Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                ></a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                            >Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                ></a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading"> </div>
                    {{--<a class="nav-link" href="charts.html"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Charts</a>
                    <a class="nav-link" href="tables.html"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Tables</a>--}}
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small"style="color: white;">Logged in as: {{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</div>
            </div>
        </nav>
    </div>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        @include('includes.dashboardFooter')

    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset ('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/vendor/semantic-ui/semantic.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendor/semantic-ui/semantic.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-notify.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 0, "asc" ]]
        } );
    } );
</script>
</body>

</html>
