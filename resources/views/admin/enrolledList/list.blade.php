@extends('admin.layouts.source')

@section('source')
<div class="container">
    <style>
        .align-middle {
            vertical-align: middle;
        }
    </style>
    <div class="mt-2">
        <h3 class="text-center">Manage Enrollment</h3>
    </div>
    <div class="float-end me-4"><h5>Total - {{ $list->total() }}</h5></div>
    @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
     @endif

    <div class="col-10 offset-1  mt-5">
        {{-- <form action="" method="get">
            @csrf
            <div class="my-3  shadow-sm d-flex">
                <label class="mt-1 me-2"> <strong>Order Status</strong> </label>
                <select name="orderStatus" id="orderStatus" class="form-control  col-2 me-2" >
                    <option class="text-center"  value="">All</option>
                    <option class="text-center" @if(request('orderStatus' ) == '0') selected @endif value="0" >Pending</option>
                    <option class="text-center"  @if(request('orderStatus')  == '1') selected @endif  value="1">Accept</option>
                    <option class="text-center" @if(request('orderStatus')  == '2') selected @endif value="2" >Reject</option>
                </select>
                <button type="submit" class="btn bg-dark text-white me-2"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>

            </div>
        </form> --}}
        @if (count($list) != 0)
        <table class="table table-striped ">
            <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th >Course Name</th>
                  <th>Image</th>
                  <th >Course Fee</th>
                  <th>Created Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="">
                 @foreach ($list as $l)
                <tr>
                 <td class="align-middle ">{{ $l->user_name }}</td>
                 <td class="align-middle ">{{ $l->course_name }}</td>
                 <td>
                    @if ($l->course_image)
                    <img src="{{ asset('storage/'.$l->course_image ) }}" style="height: 70px; width: 100px; " class=" align-middle  img-thumbnail" alt="">
                    @elseif($l->popular_image)
                    <img src="{{ asset('storage/'.$l->popular_image ) }}" style="height: 70px; width: 100px; " class=" align-middle  img-thumbnail" alt="">
                    @elseIf($l->up_coming_image)
                    <img src="{{ asset('storage/'.$l->up_coming_image ) }}" style="height: 70px; width: 100px; " class=" align-middle  img-thumbnail" alt="">
                    @elseif($l->free_image)
                    <img src="{{ asset('storage/'.$l->free_image ) }}" style="height: 70px; width: 100px; " class=" align-middle  img-thumbnail" alt="">
                    @endif
                 </td>
                  <td class="align-middle ">
                    @if (($l->fee) != null)
                    {{ $l->fee }}
                    @else
                    <span>Free</span>
                    @endif
                </td>
                  <td class="align-middle">{{ $l->created_at->format('j-F-y') }}</td>
                  <td class=" ">
                      <form action="{{ route('enrolled#statusChange',$l->id) }}" method="post">
                        @csrf
                    <div class="d-flex mt-3">
                        <div class=" me-2">
                            <select name="status" id="" class="form-control">
                                <option value="0"  @if ($l->status == 0 ) selected @endif > Pending</option>
                                <option value="1"  @if ($l->status == 1 ) selected @endif >Accept</option>
                                <option value="2"  @if ($l->status == 2 ) selected @endif >Reject</option>
                            </select>
                        </div>
                        <div class="">
                               <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </div>
                </form>

                </td>
                </tr>
                 @endforeach
              </tbody>
          </table>
          @else
          <div class="">
            <h3 class="text-center p-2 bg-danger text-dark rounded">There is no opening course</h3>
          </div>
        @endif
          <div class="mt-2 float-end">
            {{ $list->links() }}
          </div>
    </div>
</div>
@endsection

{{--
@section('script')
<script>
    $(document).ready(function(){
        $('#orderStatus').change(function(){
            $status = $('#orderStatus').val();
           console.log($status)

           $.ajax({
            type: 'get',
            url: '/admin/ajaxAdmin/sort/status',
            data : {
                'status' : $status,
            },
            dataType : 'json',
            success : function(response){
               $list = "";
               for ($i=0; $i<response.length;$i++){
                $list += `
                <tr>
                    <td> ${response[$i].user_name} </td>
                    <td>  ${response[$i].course_name} </td>
                    <td>
                        @if(${response[$i].course_image})
                        <img src="{{ asset('storage/' + ${response[$i].course_image} ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                        @elseif(${response[$i].popular_image})
                        <img src="{{ asset('storage/' + ${response[$i].popular_image} ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                        @elseIf(${response[$i].up_coming_image})
                        <img src="{{ asset('storage/' + ${response[$i].up_coming_image} ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                        @elseif(${response[$i].free_image})
                        <img src="{{ asset('storage/' + ${response[$i].free_image} ) }}" style="height: 70px; width: 100px; " class="align-middle img-thumbnail" alt="">
                        @endif
                    </td>
                    <td class="align-middle ">
                        @if(${response[$i].fee} != null)
                            ${response[$i].fee}
                        @else
                            <span>Free</span>
                        @endif
                    </td>
                    <td class="align-middle"> ${response[$i].created_at} </td>
                    <td class="">
                        <form action="{{ route('enrolled#statusChange', ${response[$i].id}) }}" method="post">
                            @csrf
                            <div class="d-flex mt-3">
                                <div class="me-2">
                                    <select name="status" id="" class="form-control">
                                        <option value="0" @if(${response[$i].status} == 0) selected @endif> Pending</option>
                                        <option value="1" @if(${response[$i].status} == 1) selected @endif>Accept</option>
                                        <option value="2" @if(${response[$i].status} == 2) selected @endif>Reject</option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                `;
                $('#dataList').html($list);
               }
            }
           })
        })
    })





</script>
@endsection --}}



