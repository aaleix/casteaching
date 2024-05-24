<?php

namespace Tests\Feature\Users;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UsersManageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function user_with_permissions_can_store_users()
    {
        $this->loginAsUserManager();

        $response = $this->post('/manage/users',[]);

        $response->assertStatus(405);
    }

    /** @test  */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $videos = create_sample_videos();

        $response = $this->get('/manage/videos');


        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
        $response->assertViewHas('videos', function ($v) use ($videos) {
           return $v->count() === count($videos) && get_class($v) === Collection::class &&
               get_class($videos[0]) === Video::class;
        });

        foreach ($videos as $video) {
            $response->assertSee($video->id);
            $response->assertSee($video->title);
        }


    }

    /** @test */
    public function user_without_users_manage_create_cannot_see_add_users()
    {
        Permission::firstOrCreate(['name'=>'videos_manage_index']);

        $user = User::create([
            'name'=>'Pepe',
            'email'=>'Pepe',
            'password'=>Hash::make('12345678')
        ]);
        $user->givePermissionTo('videos_manage_index');
        add_personal_team($user);

        Auth::login($user);
        $response = $this->get('/manage/videos');
        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');

        $response->assertDontSee('<form data-qa="form_user_create"', false);
    }

    /** @test */
    public function regular_users_cannot_manage_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->get('/manage/videos');
        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_videos()
    {
        $response = $this->get('/manage/videos');
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function superadmins_can_manage_videos(): void
    {
        $this->loginAsSuperAdmin();

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
    }

    /** @test */
    private function loginAsVideoManager(): void
    {
        Auth::login(create_video_manager_user());
    }

    private function loginAsSuperAdmin(): void
    {
        Auth::login(create_superadmin_user());
    }

    private function loginAsRegularUser(): void
    {
        Auth::login(create_regular_user());
    }

    private function loginAsUserManager(): void
    {
        Auth::login(create_users_manager_user());
    }
}
