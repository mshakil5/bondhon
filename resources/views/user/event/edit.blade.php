@extends('frontend.layouts.master')
@section('content')

<section class="fundriser">
    <div class="container">
        <!-- Image loader -->
        <div id='loading' style='display:none ;'>
            <img src="{{ asset('loader.gif') }}" id="loading-image" alt="Loading..." style="height: 225px;" />
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="title darkerGrotesque-bold lh-1 fs-1">
                            Create an event
                        </div>
                        <h5 class="para text-center mt-3 text-muted fs-6">
                            we are here to guide you every step for thre way
                        </h5>
                        <div class="ermsg"></div>
                        <!-- multistep form -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-container">
                            <form id="msform">

                                <fieldset>
                                    <h3 class="fs-subtitle para fs-6 txt-secondary text-center mb-0"> Step 1</h3>
                                    <h5 class="txt-primary mb-4 text-center ">Basic Events Info</h5>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Event Title: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{$data->title}}" />
                                            <input type="hidden" id="event_id" name="event_id" value="{{$data->id}}" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Event Organizer: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="organizer" name="organizer"  class="form-control" placeholder="Organizer" value="{{$data->organizer}}" />
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold "> Event type: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="event_type" name="event_type" class="form-control" placeholder="Event type"  value="{{$data->event_type}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold "> Event category: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="category" name="category" class="form-control" placeholder="Event Category"  value="{{$data->category}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Tags: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="tagline" name="tagline" class="form-control" placeholder="Tags"  value="{{$data->tagline}}" />
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>

                                <fieldset>
                                    <h3 class="fs-subtitle para fs-6 txt-secondary mb-0 text-center "> Step 2</h3>
                                    <h5 class="txt-primary mb-4 text-center "> Events Location & times</h5>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Venue name:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Venue name" class="form-control" id="venue_name" name="venue_name" value="{{$data->venue_name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Address:</label>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold "></label>
                                        </div> 
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6 text-start">
                                                    <label for="" class="fs-5 fw-bold ">House Number</label>
                                                    <input type="text" placeholder="House Number" id="house_number" name="house_number" value="{{$data->house_number}}" class="form-control">
                                                </div>
                                                <div class="col-md-6 text-start">
                                                    <label for="" class="fs-5 fw-bold ">Road Name</label>
                                                    <input type="text" placeholder="Road Name" id="road_name" name="road_name" value="{{$data->road_name}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold "></label>
                                        </div> 
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Town/city</label>
                                            <input type="text" placeholder="city" id="town" name="town" class="form-control" value="{{$data->town}}">
                                        </div>
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Country</label>
                                            <input type="text" placeholder="Country" id="country" name="country" class="form-control" value="{{$data->country}}">
                                        </div>
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">Postal code</label>
                                            <input type="text" id="postcode" name="postcode" placeholder="Postal code" class="form-control" value="{{$data->postcode}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start"> </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6 text-start">
                                                    <label for="" class="fs-5 fw-bold ">
                                                        Event Start:
                                                    </label>
                                                    <input type="datetime-local" id="event_start_date" name="event_start_date" class="form-control" value="{{$data->event_start_date}}" />
                                                </div>
                                                <div class="col-md-6 text-start">
                                                    <label for="" class="fs-5 fw-bold ">
                                                        Event End:
                                                    </label>
                                                    <input type="datetime-local" id="event_end_date" name="event_end_date" class="form-control"  value="{{$data->event_end_date}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                  
                                </fieldset>

                                <fieldset>
                                    <h3 class="fs-subtitle para fs-6 txt-secondary mb-0 text-center "> Step 3</h3>
                                    <h5 class="txt-primary mb-4 text-center "> Events Photo & Others</h5>

                                    <div class="row">
                                        <div class="col-md-4 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Upload Event photo:
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="" class="w-100 text-start fs-6  txt-secondary">
                                                <input type="file" name="image" class="form-control" id="image" multiple> 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Upload Event Feature photo:
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="" class="w-100 text-start fs-6  txt-secondary">
                                                <input type="file" name="fimage" class="form-control" id="fimage"> 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Event summary:
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="summery" id="summery" placeholder="Event summary" value="{{$data->summery}}"/> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Event description:
                                            </label>
                                        </div>
                                        <div class="col-md-9" style="text-align: left !Important">
                                            <textarea name="description" id="description" class="form-control summernote" placeholder="Event description">{!! $data->description !!}</textarea>
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous action-button"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>


                                <fieldset>
                                    <h3 class="fs-subtitle para fs-6 txt-secondary mb-0 text-center "> Step 4</h3>
                                    <h5 class="txt-primary mb-4 text-center "> Create ticket </h5>

                                    <div class="row"> 
                                        <div class="col-md-1 text-start">
                                            <input type="checkbox" id="pricecheck" value="1" class="me-2">
                                        </div>
                                        <div class="col-md-11 text-start">
                                            Check this if event entry is free.
                                        </div>
                                    </div>


                                    <div class="row pricediv"> 
                                        <table class="text-left">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Type</th>
                                                    <th scope="col" class="text-center">Description</th>
                                                    <th scope="col" class="text-center">Price</th>
                                                    <th scope="col" class="text-center">Quantity</th>
                                                    <th scope="col" class="text-center">Total ticket</th>
                                                    <th scope="col" class="text-center">
                                                        <a class="btn btn-sm btn-theme bg-secondary ms-1 add-new-row" id="addnewrow">+</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="priceinner">
                                                @foreach ($data->eventprice as $price)
                                                    <tr>
                                                        <td class="px-2"><input type="text" id="type" name="type[]" value="{{$price->type}}" class="form-control"><input type="hidden" id="priceid" name="priceid[]" value="{{$price->id}}" ></td>
                                                        <td class="px-2"><input type="text" id="note" name="note[]"  value="{{$price->note}}" class="form-control"></td>
                                                        <td class="px-2"><input type="number"  id="ticket_price" name="ticket_price[]"  value="{{$price->ticket_price}}" class="form-control"></td>
                                                        
                                                        <td class="px-2"><input type="number"  id="qty" name="qty[]"  value="{{$price->qty}}" class="form-control qty"></td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Quantity of ticket:
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$data->quantity}}" placeholder="Quantity of ticket">
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Ticket Price:
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" placeholder="Ticket Price" id="price" name="price" value="{{$data->price}}" class="form-control">
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Sale start date/time:
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="datetime-local" id="sale_start_date" name="sale_start_date" class="form-control"  value="{{$data->sale_start_date}}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-start">
                                            <label for="" class="fs-5 fw-bold ">
                                                Sale end date/time:
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="datetime-local" id="sale_end_date" name="sale_end_date" class="form-control"  value="{{$data->sale_end_date}}"/>
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <input type="submit" name="submit" id="updateBtn" class="submit action-button" value="Update" />
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>




@endsection


@section('script')
<script>
    $(function () {
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({ 'transform': 'scale(' + scale + ')' });
                    next_fs.css({ 'left': left, 'opacity': opacity });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({ 'left': left });
                    previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })

    });
</script>

<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });

    $("#pricecheck").click(function() {
        if($(this).is(":checked")) {
            $(".pricediv").hide(200);
        } else {
            $(".pricediv").show(300);
        }
    });

</script>
<script>

    function removeRow(event) {
            event.target.parentElement.parentElement.remove(); 
        }

        $("#addnewrow").click(function() {

        var pmarkup = '<tr><td class="px-2"><input type="text" id="type" name="type[]" class="form-control"></td><td class="px-2"><input type="text" id="note" name="note[]" class="form-control"></td><td class="px-2"><input type="number" id="ticket_price" name="ticket_price[]" class="form-control"></td><td class="px-2"><input type="number" id="qty" name="qty[]" class="form-control qty"></td><td width="50px" style="padding-left:2px"><div style="color:#fff;user-select:none;padding:2px;background:red;width:25px;display:flex;align-items:center;margin-right:5px;justify-content:center;border-radius:4px;left:4px" onclick="removeRow(event)">X</div></td></tr>';
        $("div #priceinner ").append(pmarkup);

    });
    
    var storedFiles = [];
$(document).ready(function () { 
    //header for csrf-token is must in laravel
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    //
    var url = "{{URL::to('/user/update-event')}}";
    // console.log(url);

    $("#updateBtn").click(function(){
        // event create 
            $("#loading").show();

            var file_data = $('#fimage').prop('files')[0];
            if(typeof file_data === 'undefined'){
                file_data = 'null';
            }
            var form_data = new FormData();
            for(var i=0, len=storedFiles.length; i<len; i++) {
                form_data.append('image[]', storedFiles[i]);
            }
            form_data.append('fimage', file_data);
            form_data.append("event_id", $("#event_id").val());
            form_data.append("event_type", $("#event_type").val());
            form_data.append("title", $("#title").val());
            form_data.append("category", $("#category").val());
            form_data.append("tagline", $("#tagline").val());
            form_data.append("organizer", $("#organizer").val());
            form_data.append("venue_name", $("#venue_name").val());
            form_data.append("house_number", $("#house_number").val());
            form_data.append("road_name", $("#road_name").val());
            form_data.append("country", $("#country").val());
            form_data.append("town", $("#town").val());
            form_data.append("postcode", $("#postcode").val());
            form_data.append("event_start_date", $("#event_start_date").val());
            form_data.append("event_end_date", $("#event_end_date").val());
            form_data.append("summery", $("#summery").val());
            form_data.append("description", $("#description").val());
            form_data.append("quantity", $("#quantity").val());
            form_data.append("price", $("#price").val());
            form_data.append("sale_end_date", $("#sale_end_date").val());
            form_data.append("sale_start_date", $("#sale_start_date").val());

            if ($('#pricecheck').is(":checked"))
            {
                form_data.append("is_free", $("#pricecheck").val());
            }

                var priceid = $("input[name='priceid[]']")
                    .map(function(){return $(this).val();}).get();

                var type = $("input[name='type[]']")
                    .map(function(){return $(this).val();}).get();

                var qty = $("input[name='qty[]']")
                    .map(function(){return $(this).val();}).get();

                var ticket_price = $("input[name='ticket_price[]']")
                    .map(function(){return $(this).val();}).get();

                var note = $("input[name='note[]']")
                    .map(function(){return $(this).val();}).get();

                    form_data.append('priceid', priceid);
                    form_data.append('type', type);
                    form_data.append('qty', qty);
                    form_data.append('ticket_price', ticket_price);
                    form_data.append('note', note);

            
            $.ajax({
                url: url,
                method: "POST",
                contentType: false,
                processData: false,
                data:form_data,
                success: function (d) {
                    if (d.status == 303) {
                        $("#loading").hide();
                        $(".ermsg").html(d.message);
                    }else if(d.status == 300){
                        pagetop();
                        $("#loading").hide();
                        $(".ermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }
                },
                complete:function(data){
                    $("#loading").hide();
                },
                error: function (d) {
                    console.log(d);
                }
            });
        // event create 
    });

});

// images
        /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
        $(document).on('change','#image',function(){
            len_files = $("#image").prop("files").length;
            var construc = "<div class='row'>";
            for (var i = 0; i < len_files; i++) {
                var file_data2 = $("#image").prop("files")[i];
                storedFiles.push(file_data2);
                construc += '<div class="col-3 singleImage my-3"><span data-file="'+file_data2.name+'" class="btn ' +
                    'btn-sm btn-danger imageremove2">&times;</span><img width="120px" height="auto" src="' +  window.URL.createObjectURL(file_data2) + '" alt="'  +  file_data2.name  + '" /></div>';
            }
            construc += "</div>";
            $('.preview2').append(construc);
        });

        $(".preview2").on('click','span.imageremove2',function(){
            var trash = $(this).data("file");
            for(var i=0;i<storedFiles.length;i++) {
                if(storedFiles[i].name === trash) {
                    storedFiles.splice(i,1);
                    break;
                }
            }
            $(this).parent().remove();

        });

        // qty calculation

    $("body").delegate(".qty","keyup",function(event){
        event.preventDefault();
        var row = $(this).parent().parent();
        var qty = row.find('.qty').val();
            if (isNaN(qty)) {
                qty = 1;
            }
            if (qty < 1) {
                qty = 1;
            }
        
        var qty_total= 0;
        $('.qty').each(function(){
            qty_total += ($(this).val()-0);
        })
        $('#quantity').val(qty_total);
        
    })
    // qty calculation end
</script>
@endsection
