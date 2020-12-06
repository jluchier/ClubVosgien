@servers(['web' => 'pi@dyn.raspberrydemontbeliard.ovh -p 2222'])
{{--@servers(['web' => 'pi@dyn.raspberrydemontbeliard.ovh -p 222'])--}}

@setup
    $dir="/home/pi/ClubVosgien";
@endsetup

@task('deploy')
    cd {{$dir}};
    git pull;
    composer install --no-dev --no-progress;
    php artisan migrate --force;
    php artisan optimize;
@endtask
