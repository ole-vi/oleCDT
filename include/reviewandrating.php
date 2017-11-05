<!-- Modal -->
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Review & Rating</h4>
      </div>
      <div class="modal-body">

        <form role="form" method="post" action="ratingreview">

          <!--<div class="form-group">
            <label for="pwd">Title</label>
            <input type="text" id="title" name="title" placeholder="Review Title" class="form-control" required>
          </div>-->

          <div class="form-group">
            <label for="pwd">Review</label>
            <textarea id="description" name="review" placeholder="Write Review" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="pwd">Rating</label>
	          <br>

            <fieldset id='demo1' class="rating">
              <input class="stars" type="radio" id="star5" name="rating" value="5" />
              <label class = "full" for="star5" title="Awesome - 5 stars"></label>
              <input class="stars" type="radio" id="star4" name="rating" value="4" />
              <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
              <input class="stars" type="radio" id="star3" name="rating" value="3" />
              <label class = "full" for="star3" title="Meh - 3 stars"></label>
              <input class="stars" type="radio" id="star2" name="rating" value="2" />
              <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
              <input class="stars" type="radio" id="star1" name="rating" value="1" />
              <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
          </div>
          <div class="clearfix"></div>

          <input type="hidden" id="oid" name="oid" value="<?php echo $id; ?>">
          <input type="hidden" id="id" name="in_id" value="<?php echo $_SESSION['id']; ?>">
          <input type="submit" class="btn btn-primary bookbutton" name="ratings" value="Submit">
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<style>
/****** Rating Starts *****/
@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

.rating {
  border: none;
  float: left;
}
 
.rating > input { display: none; }

.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
  float: right;
}
 
.rating > input:checked ~ label, 
.rating:not(:checked) > label:hover,  
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

.rating > input:checked + label:hover, 
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, 
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

 /* Downloaded from http://devzone.co.in/ */
</style>
