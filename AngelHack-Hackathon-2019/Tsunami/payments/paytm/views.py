from django.shortcuts import render
from django.http import HttpResponse
from django.utils.translation import get_language
from django.views.decorators.csrf import csrf_exempt
from django.contrib.auth.decorators import login_required
from django.conf import settings

from . import Checksum


from paytm.models import PaytmHistory
# Create your views here.

@login_required
def home(request):
    return HttpResponse("<html lang="en">

<head>
    <title>DeepBlue</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-custom">
        <div class="container">
            
            <a class="navbar-brand" href="#"> <b><u>DeepBlue</u></b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="deepblue.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Donation
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                             <a class="dropdown-item" href="paytm.html">Direct Donation</a>
                            <a class="dropdown-item" href="barter.php">Help Us Buy</a>
                            <a class="dropdown-item" href="collectdonate.php">Request Collection</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ngo_map.php">NGO Service</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-custom">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">DONATE TO THE VICTIMS</a>
        </div>
    </nav>
    <div class="container">
            <div class="row mt-5">
                    <div class="col">
                        <div class="jumbotron navbar-custom text-white">
                            <h1 class="display-4">Donate via Paytm</h1>
                            <p class="lead">Easy One-Step Process that can help thousands in need.</p>
                            <hr class="my-4">
                            <p style="color:red;"> DISCLAIMER: Your PayTm amount will be used to help the victims by our organisation and partnered NGOs.
                            </p>
                            <a class="btn btn-primary btn-lg btn-block" href='"+ settings.HOST_URL +"/paytm/payment' role="button">Pay with PayTM</a>
                        </div>
                    </div>
                </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"
        integrity="sha256-V52dl3OFjoY+fYAkifhLJ7f1V7mZAKPGCQoWzoQxrEU=" crossorigin="anonymous"></script>
    <script>
        $.backstretch("bg1.jpg");
    </script>
</body>

</html>")


def payment(request):
    MERCHANT_KEY = settings.PAYTM_MERCHANT_KEY
    MERCHANT_ID = settings.PAYTM_MERCHANT_ID
    get_lang = "/" + get_language() if get_language() else ''
    CALLBACK_URL = settings.HOST_URL + get_lang + settings.PAYTM_CALLBACK_URL
    # Generating unique temporary ids
    order_id = Checksum.__id_generator__()

    bill_amount = 1000
    if bill_amount:
        data_dict = {
                    'MID':MERCHANT_ID,
                    'ORDER_ID':order_id,
                    'TXN_AMOUNT': bill_amount,
                    'CUST_ID':'shubhashree10sep@gmail.com',
                    'INDUSTRY_TYPE_ID':'Retail',
                    'WEBSITE': settings.PAYTM_WEBSITE,
                    'CHANNEL_ID':'WEB',
                    #'CALLBACK_URL':CALLBACK_URL,
                }
        param_dict = data_dict
        param_dict['CHECKSUMHASH'] = Checksum.generate_checksum(data_dict, MERCHANT_KEY)
        return render(request,"payment.html",{'paytmdict':param_dict})
    return HttpResponse("Bill Amount Could not find. ?bill_amount=10")


@csrf_exempt
def response(request):
    if request.method == "POST":
        MERCHANT_KEY = settings.PAYTM_MERCHANT_KEY
        data_dict = {}
        for key in request.POST:
            data_dict[key] = request.POST[key]
        verify = Checksum.verify_checksum(data_dict, MERCHANT_KEY, data_dict['CHECKSUMHASH'])
        if verify:
            PaytmHistory.objects.create(user=request.user, **data_dict)
            return render(request,"response.html",{"paytm":data_dict})
        else:
            return HttpResponse("checksum verify failed")
    return HttpResponse(status=200)