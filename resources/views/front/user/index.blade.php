 @extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12 py-3 bg-white">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $user->name }}</h3>
                </div>
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="booking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="true">Order History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active table-responsive" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                            @if(!$orders->isEmpty())
                                <table class="table table-hover table-striped table-sm my-3">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Details</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <ul>
                                            @foreach($order->order_details as $detail)
                                            <li>
                                                {{ $detail->product->name }} Rs. {{ number_format($detail->price) }} x {{ $detail->qty }} = Rs. {{ number_format($detail->total) }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>Rs. {{ number_format($order->total) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        @if($order->status != 'completed' && $order->status != 'cancelled')
                                        <a href="{{ route('user.order.cancel', $order->id) }}" class="btn btn-danger btn-sm cancel">Cancel Order</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            @else
                                <h6 class="text-center"><em>No order added.</em></h6>
                            @endif
                        </div>
                        <div class="tab-pane fade table-responsive" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            @if(!$reviews->isEmpty())
                            <table class="table table-hover table-striped table-sm my-3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{ $review->product->name }}
                                    </td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>
                                        <a href="{{ route('user.review.edit', $review->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('user.review.delete', $review->id) }}" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <h6 class="text-center"><em>No review added.</em></h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
