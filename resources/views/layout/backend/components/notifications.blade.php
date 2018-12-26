<script>
        $(document).ready(function(){
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    $.toast({
                    heading: 'Lỗi',
                    text: '{{$error}}',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 6
                });
                @endforeach
             @endif
    
             @if(session('success'))
                $.toast({
                    heading: 'Thành công',
                    text: '{{session('success')}}',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6
                });
             @endif
    
             @if(session('error'))
                $.toast({
                    heading: 'Lỗi',
                    text: '{{session('error')}}',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 6
                });
             @endif
        })
        
    </script>