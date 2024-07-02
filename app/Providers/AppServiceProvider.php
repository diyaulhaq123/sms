<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Staff\StaffRepository;
use App\Repositories\User\UserRepoInterface;
use App\Repositories\Admin\AdminRepoInterface;
use App\Repositories\Staff\StaffRepoInterface;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Guardian\GuardianRepository;
use App\Repositories\Student\StudentRepoInterface;
use App\Repositories\Academics\AcademicsRepository;
use App\Repositories\Academics\GradeBookRepository;
use App\Repositories\Guardian\GuardianRepoInterface;
use App\Repositories\Staff\ExamOfficer\EoRepository;
use App\Repositories\Staff\Teacher\TeacherRepository;
use App\Repositories\Academics\AcademicsRepoInterface;
use App\Repositories\Academics\GradeBookRepoInterface;
use App\Repositories\Staff\ExamOfficer\EoRepoInterface;
use App\Repositories\Staff\Accountant\AccountRepository;
use App\Repositories\Staff\Teacher\TeacherRepoInterface;
use App\Repositories\Staff\Accountant\AccountRepoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepoInterface::class, AdminRepository::class);
        $this->app->bind(StaffRepoInterface::class, StaffRepository::class);
        $this->app->bind(GuardianRepoInterface::class, GuardianRepository::class);
        $this->app->bind(UserRepoInterface::class, UserRepository::class);
        $this->app->bind(AcademicsRepoInterface::class, AcademicsRepository::class);
        $this->app->bind(GradeBookRepoInterface::class, GradeBookRepository::class);
        $this->app->bind(TeacherRepoInterface::class, TeacherRepository::class);
        $this->app->bind(AccountRepoInterface::class, AccountRepository::class);
        $this->app->bind(EoRepoInterface::class, EoRepository::class);
        $this->app->bind(StudentRepoInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::shouldBeStrict();
        Blade::if('roles', function (array $roles) {
            return Auth::check()
                && in_array(Auth::user()->role, $roles, true);
        });

    }
}
