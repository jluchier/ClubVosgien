@servers(['web' => 'pi@192.168.1.22 -p 222'])
{{--@servers(['web' => 'pi@dyn.raspberrydemontbeliard.ovh -p 222'])--}}

@setup
    $dir="/home/pi/w3Template";
@endsetup

@task('deploy')
    cd {{$dir}};
    git pull;
    {{--php artisan migrate;--}}
@endtask

@task('composer')
    composer update --no-dev --no-progress;
@endtask

@macro('deploy-update')
    deploy
    composer
@endmacro