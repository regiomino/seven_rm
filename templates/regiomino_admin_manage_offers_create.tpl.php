<?php
$form = drupal_get_form('regiomino_admin_manage_offers_create'); 
//Notwendige Metadaten zur Formularverarbeitung rendern und ausgeben
echo render($form['form_id']);
echo render($form['form_build_id']);
echo render($form['form_token']);
?>
<div class="row"> 
    <div class="sticky-container clearfix">
        <div class="sidepanel-wrapper"> 
            <div class="sidepanel">
         
                <?php echo render($form['regiomino_offer_create']['submit']); ?>
            </div>
        </div>
        <div class="formcontainer-wrapper"> 
            <div class="formcontainer">
                <div id="product-information"  class="stickem-anchor section-wrapper">
                
                    <h1 class="section-title">1. Produktinfos eingeben </h1>
                    <span class="required-fields"> Die mit <span class="redstar">*</span> gekennzeichneten Felder müssen ausgefüllt werden</span>
              
                    <div class="row">
                        <div class="sub-heading"> 
                            <h2 class="sub-title"><span class="signpost"></span>Titel <span class="redstar">*</span> </h2>
                            <div class="description">Bitte geben Sie Ihrem Angebot einen kurzen aussagekräftigen Titel.</div>
                        </div>
                        <div class="sub-content"> 
                            <?php echo render($form['regiomino_offer_create']['productinfo']['title']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading"> 
                            <h2 class="sub-title"><span class="signpost"></span>Kategorie <span class="redstar">*</span></h2>
                            <div class="description">Bitte wählen Sie eine Haupt- und Unterkategorie</div>
                        </div>
                        <div class="sub-content"> 
                            <?php echo render($form['regiomino_offer_create']['productinfo']['category1']); ?>
                            <?php echo render($form['regiomino_offer_create']['productinfo']['category2']); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Bilder <span class="redstar">*</span></h2>
                            <div class="description">Bitte wählen Sie bis zu 5 Produktbilder für Ihr Angebot</div>
                        </div>
                        <div class="sub-content"> 
                            <?php echo render($form['regiomino_offer_create']['productinfo']['images']['image_0']); ?>
                            <?php echo render($form['regiomino_offer_create']['productinfo']['images']['image_1']); ?>
                            <?php echo render($form['regiomino_offer_create']['productinfo']['images']['image_2']); ?>
                            <?php echo render($form['regiomino_offer_create']['productinfo']['images']['image_3']); ?>
                            <?php echo render($form['regiomino_offer_create']['productinfo']['images']['image_4']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Produktbeschreibung <span class="redstar">*</span></h2>
                            <div class="description">Bitte beschreiben Sie Ihr Angebot so präzise wie möglich. Konzentrieren Sie sich dabei auf spezielle Eigenschaften wie Geschmack, Herstellung, Zubereitung oder Geschichte. Je interessanter Sie Ihr Produkt beschreiben, desto wahrscheinlicher ist es, dass es gekauft wird.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['productinfo']['description']); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Produktherkunft</h2>
                            <div class="description">Bitte geben Sie den Herkunftsort des Produktes an. Je präziser die Angabe ist, desto besser werden Sie in den Kategorien gerankt.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['productinfo']['productorigin_fieldset']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Haltbarkeit</h2>
                            <div class="description">Bitte definieren Sie, wie lange Ihr Produkt haltbar ist.</div>
                        </div>
                        
                        <div class="sub-content">
                             <?php echo render($form['regiomino_offer_create']['productinfo']['expiry_fieldset']); ?>
                         </div>
                    </div>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Gütesiegel</h2>
                            <div class="description">Bitte wählen Sie alle Gütesiegel, die Ihr Produkt besitzt.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['productinfo']['qualitylabels']); ?>
                        </div>
                    </div>
                    
                    <div class="row last grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Wichtige Hinweise</h2>
                            <div class="description">Bitte nennen Sie weitere wichtige Hinweise zu Ihrem Produkt, die in der Produktbeschreibung noch nicht enthalten sind. Z.B. Allergene, spezielle Lageranforderungen, usw. Der Kunde muss sich auf Ihre Angaben in diesem Feld verlassen können.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['productinfo']['importantnotices']); ?>
                        </div>
                    </div>
                </div>
                
                <div id="price-information" class="stickem-anchor section-wrapper">
                     
                        <h1 class="section-title">2. Preisinfos eingeben </h1>
                        <span class="required-fields"> Die mit <span class="redstar">*</span> gekennzeichneten Felder müssen ausgefüllt werden</span>
                   
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Produkteinheit <span class="redstar">*</span></h2>
                            <div class="description">Bitte wählen Sie eine Einheit für dieses Produkt</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['priceinfo']['packingunit_first']); ?>
                            <?php echo render($form['regiomino_offer_create']['priceinfo']['packingunit_second']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Produktbestand <span class="redstar">*</span></h2>
                            <div class="description">Bitte definieren Sie die Größe Ihres Produktbestandes</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['priceinfo']['stock']); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>MwSt. <span class="redstar">*</span></h2>
                            <div class="description">Bitte wählen Sie den MwSt.-Satz für dieses Produkt</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['priceinfo']['vat']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Gebinde <span class="redstar">*</span></h2>
                            <div class="description">Bitte definieren Sie, wie viele Einzelstücke ein Gebinde ausmachen und geben Sie die entsprechenden Daten hier ein. Ihr Produkt wird ausschließlich in den hier genannten Gebinden angeboten.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['priceinfo']['tradingprices']); ?>
                        </div>
                    </div>
                </div>
                <div id="logistics-information" class="stickem-anchor ">
                    
                        <h1 class="section-title">3. Logistikinfos eingeben </h1>
                        <span class="required-fields"> Die mit <span class="redstar">*</span> gekennzeichneten Felder müssen ausgefüllt werden</span>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Aufschub zwischen Bestellung und Abholung <span class="redstar">*</span></h2>
                            <div class="description">Bitte geben Sie an, wie viele Stunden vor dem Liefertag die Bestellung bei Ihnen eingehen muss. Bsp.: Eine Angabe von 6 Stunden bedeutet, dass Ihr Produkt am Tag vor der Lieferung nur noch bis 18:00 gekauft werden kann.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['logisticsinfo']['delay']); ?>
                        </div>
                    </div>
                    
                    <div class="row grey">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Kühlklasse</h2>
                            <div class="description">Bitte geben Sie die Kühlklasse Ihres Produktes ein.</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['logisticsinfo']['cooling']); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="sub-heading">
                            <h2 class="sub-title"><span class="signpost"></span>Versandgewicht</h2>
                            <div class="description">Bitte geben Sie das Versandgewicht Ihres Produktes ein, inkl. potentiellen Trägerverpackungen (z.B. bei einem Getränk das Gewicht der gesamten Flasche, nicht nur des Inhalts).</div>
                        </div>
                        <div class="sub-content">
                            <?php echo render($form['regiomino_offer_create']['logisticsinfo']['shippingweight']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row"> 
<?php echo render($form['regiomino_offer_create']['saveastemplate']); ?>
<?php 
echo render($form['regiomino_offer_create']['submit']);
?>
</div>