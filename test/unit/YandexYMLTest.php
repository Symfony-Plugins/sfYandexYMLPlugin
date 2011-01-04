<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(null, new lime_output_color());


$cat1 = new sfYandexYMLCategory(1, 'Фиговины & пряники');
$cat2 = new sfYandexYMLCategory(2, 'Phones');
$cat3 = new sfYandexYMLCategory(3, 'Androids', 2);

$yml  = new sfYandexYML(
    'Test shop',
    'OOO Roga&Kopita',
    'http://example-shop.com/?param1=1&param2=2'
);

$yml_offer = new sfYandexYMLOffer_VendorModel($cat3->getId(), true);
$yml_offer->categoryId = 1;
$yml_offer->country_of_origin = 'Russia';
$yml_offer->currencyId = 'RUR';
$yml_offer->delivery = true;
$yml_offer->downloadable = false;
$yml_offer->local_delivery_cost = 200;
$yml_offer->description = 'the product description <test>';
$yml_offer->model = 'The product model';
$yml_offer->name  = 'The product name & name';
$yml_offer->picture = 'http://example-shop.com/files?s=1&image=2.jpg';
$yml_offer->url = 'http://example-shop.com/product?s=1&id=2223';
$yml_offer->price  = '2399.32';
$yml_offer->typePrefix = 'Трындын';
$yml_offer->vendor = 'Samsung';
$yml_offer->vendorCode = 'Samsung WB500';

$yml->addCategory($cat1)->addCategory($cat2);
$yml->addCategory($cat3);

$yml->addOffer($yml_offer);

$yml->generateYML();

$t->is( $yml_offer->toXML()->saveXML(), '');

$t->is( $yml->getXML()->saveXML(), '' );