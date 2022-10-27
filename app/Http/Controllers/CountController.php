<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Carbon\Carbon;

class CountController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->haulertable = 'hauler';
        $this->trucktable = 'truck';
        $this->ratingstable = 'ratings';
        $this->wastetable = 'wasteCollected';
        $this->wastetableR = 'wasteRecycled';
        $this->reportTable = 'report';
       
    }

    public function index()
    {
        //$key = $id;

        $hauler = $this->database->getReference($this->haulertable)->getValue();
        $haulerG = $this->database->getReference($this->haulertable)->getValue();
        $haulerC = $reference = $this->database->getReference($this->haulertable)->getSnapshot()->numChildren();
        //$detail = $this->database->getReference($this->haulertable)->getValue();


        $vacant = "Vacant";
        $occupied = "Occupied";
        $vacant_counter = 0;
        $occupied_counter = 0;
       

        $male = "Male";
        $female = "Female";
        $male_counter = 0;
        $female_counter = 0;
     
        



        $truck = $this->database->getReference($this->trucktable)->getValue();
        $truckC = $reference = $this->database->getReference($this->trucktable)->getSnapshot()->numChildren();

        $ratings = $this->database->getReference($this->ratingstable)->getValue();
        $ratingsC = $reference = $this->database->getReference($this->ratingstable)->getSnapshot()->numChildren();

        $one = "1.0";
        $one1 = "1.5";
        $two = "2.0";
        $two1 = "2.5";
        $three = "3.0";
        $three1 = "3.5";
        $four = "4.0";
        $four1 = "4.5";
        $five = "5.0";
        $five1 = "5.5";

        $one_counter = 0;
        $one1_counter = 0;
        $two_counter = 0;
        $two1_counter = 0;
        $three_counter = 0;
        $three1_counter = 0;
        $four_counter = 0;
        $four1_counter = 0;
        $five_counter = 0;
        $five1_counter = 0;

    


        $wasteCollected = $this->database->getReference($this->wastetable)->getValue();
        $wasteCollectedL = $this->database->getReference($this->wastetable)->getValue();
        $wasteCollectedD = $this->database->getReference($this->wastetable)->getValue();
        $wasteCollectedW = $this->database->getReference($this->wastetable)->getValue();
        $wasteCollectedM = $this->database->getReference($this->wastetable)->getValue();
        $wasteCollectedC = $reference = $this->database->getReference($this->wastetable)->getSnapshot()->numChildren();

        $con = "Concrete";
        $metal = "Metal";
        $mix = "Mixed C&D Waste";
        $wood = "Wood";
        $glass = "Glass";
        $soil ="Soil";
        $con_counter = 0;
        $metal_counter = 0;
        $mix_counter = 0;
        $wood_counter = 0;
        $glass_counter = 0;
        $soil_counter = 0;
        

        //district 1
        $pasig1 = "Bagong Ilog";
        $pasig2 = "Bagong Katipunan";
        $pasig3 = "Bambang";
        $pasig4 = "Buting";
        $pasig5 = "Caniogan";
        $pasig6 = "Kalawaan";
        $pasig7 = "Kapasigan";
        $pasig8 = "Kapitolyo";
        $pasig9 = "Malinao";
        $pasig10 = "Oranbo";
        $pasig11 = "Palatiw";
        $pasig12 = "Pineda";
        $pasig13 = "Sagad";
        $pasig14 = "San Antonio";
        $pasig15 = "San Joaquin";
        $pasig16 = "San Jose";
        $pasig17 = "San Nicolas";
        $pasig18 = "Sta. Cruz";
        $pasig19 = "Sta. Rosa";
        $pasig20 = "Sto. Tomas";
        $pasig21 = "Sumilang";
        $pasig22 = "Ugong";
        //district 2
        $pasig23 = "Dela Paz";
        $pasig24 = "Manggahan";
        $pasig25 = "Maybunga";
        $pasig26 = "Pinagbuhatan";
        $pasig27 = "Rosario";
        $pasig28 = "San Miguel";
        $pasig29 = "Santolan";
        $pasig30 = "Sta. Lucia";

        //count
        //district 1
        $pasig1c = 0;
        $pasig2c = 0;
        $pasig3c = 0;
        $pasig4c = 0;
        $pasig5c = 0;
        $pasig6c = 0;
        $pasig7c = 0;
        $pasig8c = 0;
        $pasig9c = 0;
        $pasig10c = 0;
        $pasig11c = 0;
        $pasig12c = 0;
        $pasig13c = 0;
        $pasig14c = 0;
        $pasig15c = 0;
        $pasig16c = 0;
        $pasig17c = 0;
        $pasig18c = 0;
        $pasig19c = 0;
        $pasig20c = 0;
        $pasig21c = 0;
        $pasig22c = 0;
        //district 2
        $pasig23c = 0;
        $pasig24c = 0;
        $pasig25c = 0;
        $pasig26c = 0;
        $pasig27c = 0;
        $pasig28c = 0;
        $pasig29c = 0;
        $pasig30c = 0;

       
        
        //DAILY
        $date1 = "18-Oct-2021";
        $date2 = "29-Oct-2021";
        $date3 = "12-Nov-2021";
        $date4 = "13-Nov-2021";
        $date5 = "01-Dec-2021";
        $date6 = "03-Dec-2021";
        $date7 = "04-Dec-2021";
        //$date4 = "";
        //$date5 = "";

        $date1_c = 0;
        $date2_c = 0;
        $date3_c = 1;
        $date4_c = 1;
        $date5_c = 0;
        $date6_c = 0;
        $date7_c = 0;
        
    
        
        //WEEKLY
        $week1 = "Oct 17-23, 2021";
        $week2 = "Oct 24-30, 2021";
        $week3 = "Nov 07-13, 2021";
        $week4 = "04-Dec-2021";
        //$date4 = "";
        //$date5 = "";

        $week1_c = 5;
        $week2_c = 1;
        $week3_c = 2;
        $week4_c = 2;
        
      

        //MONTHLY
        $mon1 = "October";
        $mon2 = "November";
        $mon3 = "04-Dec-2021";
        //$date4 = "";
        //$date5 = "";

        $mon1_c = 6;
        $mon2_c = 2;
        $mon3_c = 3;
      
      




        $wasteRecycled = $this->database->getReference($this->wastetableR)->getValue();
        $wasteRecycledC = $reference = $this->database->getReference($this->wastetableR)->getSnapshot()->numChildren();

        
        $conR = "Concrete";
        $metalR = "Metal";
        $mixR = "Mixed C&D Waste";
        $woodR = "Wood";
        $glassR = "Glass";
        $soilR ="Soil";

        $woodR_counter = 0;
        $conR_counter = 0;
        $mixR_counter = 0;
        $glassR_counter = 0;
        $soilR_counter = 0;
        $metalR_counter = 0;

     


        // $weekly_a = Carbon::today()->subDays(7)->format('d M Y');
        // $monthly_a = Carbon::today()->subDays(30)->format('d M Y');
    
        // $dateNOW = Carbon::today()->format('d M Y');

        // $wasteCollectedA = $this->database->getReference($this->wastetable)->getValue();
        // $weekly_accepted = 0;
        // $mothly_accepted =0;
        // //$daily_accepted =0;

        // if($wasteCollectedA != null){
        //     foreach ($wasteCollectedA as $key =>$wasteCollectedA) {
        //         if(($wasteCollectedA['date'] >= strtoupper($weekly_a) && $wasteCollectedA['date'] <=$dateNOW)){
        //             ++$weekly_accepted;
        //         }
        //         if(($wasteCollectedA['date'] >= strtoupper($monthly_a) && $wasteCollectedA['date'] <=$dateNOW)){
        //             ++$mothly_accepted;
        //         }
                
        //     }
        // }




        $reportC = $reference = $this->database->getReference($this->reportTable)->getSnapshot()->numChildren();


        


        //$truck = $this->database->getReference($this->trucktable)->getValue()->count();
       // $ratings = $this->database->getReference($this->ratingstable)->getValue()->count();
        //$wasteCollected = $this->database->getReference($this->wastetable)->getValue()->count();
        return view ('home', compact('haulerC', 'truckC', 'ratingsC', 'wasteCollectedC' ,'vacant_counter', 'occupied_counter','con_counter',
                    'metal_counter','mix_counter','wood_counter','one_counter','two_counter','three_counter','four_counter','five_counter',
                    'one1_counter','two1_counter','three1_counter','four1_counter','five1_counter','wasteRecycledC','woodR_counter','conR_counter',
                    'reportC','male_counter', 
                    'female_counter','date2_c','date3_c','date4_c','date1_c','mon1_c','mon2_c','week1_c','week2_c','week3_c','mon1_c','mon2_c',
                    'pasig1c','pasig2c','pasig3c','pasig4c','pasig5c','pasig6c','pasig7c','pasig8c','pasig9c','pasig10c',
                    'pasig11c','pasig12c','pasig13c','pasig14c','pasig15c','pasig16c','pasig17c','pasig18c','pasig19c','pasig20c',
                    'pasig21c','pasig22c','pasig23c','pasig24c','pasig25c','pasig26c','pasig27c','pasig28c','pasig29c','pasig30c',
                    'date5_c','date6_c','date7_c','week4_c','mon3_c',
                    'glass_counter','soil_counter',
                    'glassR_counter','soilR_counter','mixR_counter','metalR_counter'
                   
                    ));
    }


   //,'weekly_accepted','mothly_accepted'
    
}
