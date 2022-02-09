<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\post;
use App\Models\category;
use App\Models\settings;
use Illuminate\Http\Request;

class frontendViewManagement extends Controller
{

    public function HomePage(){
        return view('frontend.index');
    }

    public function HomePageManage(){
        $st=settings::find(1);
        return view('frontend.Homepage.index');
    }



     public function contactsInfo(){
        $st=settings::find(1);
        return view('frontend.contact',[
            'settings' =>$st,
        ]);
     }
// Services Section
     public function Balance_transfer(){
         return view('frontend.services.balance-transfer');
     }

     public function Bill_and_Fee_payment(){
        return view('frontend.services.bill-and-fee');
    }
     public function marchentPayment(){
        return view('frontend.services.merchant');
    }

    public function balanceEnquiry(){
        return view('frontend.services.balance-enquiry');
    }

    public function corporateService(){
        return view('frontend.services.corporate-service');
    }

    public function mobileTopup(){
        return view('frontend.services.mobile-top-up');
    }

    public function enhanceBanking(){
        return view('frontend.services.enhancing-banking');
    }


// FAq Section

    public function faqInfo(){
        return view('frontend.faq');
    }

// Footer Menu Item

public function AboutUs(){
    return view('frontend.FooterMenus.about_us');
}

public function ServiceDetails(){
    return view('frontend.FooterMenus.service-details');
}

public function Career(){
    return view('frontend.FooterMenus.career');
}





}
