@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12 py-3 bg-white">
            <div class="row">
                <div class="col-md-5 col-sm-6 mx-auto">
                    <div class="row">
                        <div class="col-12">
                            <h4>Edit Review</h4>
                        </div>
                        <div class="col-12">
                            {{ Form::open(['method' => 'post', 'route' => ['user.review.update', $review->id]]) }}
                                <div class="form-group">
                                    <label for="description">Review</label>
                                    <textarea name="comment" id="description" rows="5" class="form-control" required><?php echo $review->comment; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                                        <input type="radio" id="star5" name="rating" value="5" <?php echo $review->rating == 5 ? 'checked' : ''; ?> /><label for="star5" title="5 star">5</label>
                                        <input type="radio" id="star4" name="rating" value="4" <?php echo $review->rating == 4 ? 'checked' : ''; ?> /><label for="star4" title="4 star">4</label>
                                        <input type="radio" id="star3" name="rating" value="3" <?php echo $review->rating == 3 ? 'checked' : ''; ?> /><label for="star3" title="3 star">3</label>
                                        <input type="radio" id="star2" name="rating" value="2" <?php echo $review->rating == 2 ? 'checked' : ''; ?> /><label for="star2" title="2 star">2</label>
                                        <input type="radio" id="star1" name="rating" value="1"  <?php echo $review->rating == 1 ? 'checked' : ''; ?> /><label for="star1" title="1 star">1</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
