<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Feedback;

class FeedbackTest extends TestCase
{
    /** @test */
    public function itCanDisplayAListOfFeedbackMessages()
    {
        $this->actingAsAdmin();

        Feedback::factory()->create(['name' => 'User']);

        $response = $this->get(route('dashboard.feedback.index'));

        $response->assertSuccessful();

        $response->assertSee('User');
    }

    /** @test */
    public function itCanDisplayTheFeedbackDetails()
    {
        $this->actingAsAdmin();

        $feedback = Feedback::factory()->create(['name' => 'User']);

        $response = $this->get(route('dashboard.feedback.show', $feedback));

        $response->assertSuccessful();

        $response->assertSee('User');
    }

    /** @test */
    public function itCanMarkTheFeedbackAsRead()
    {
        $this->actingAsAdmin();

        $feedback = Feedback::factory()->create(['name' => 'User', 'read_at' => null]);

        $this->assertFalse($feedback->read());

        $this->get(route('dashboard.feedback.show', $feedback));

        $this->assertTrue($feedback->refresh()->read());
    }

    /** @test */
    public function itCanDeleteTheFeedback()
    {
        $this->actingAsAdmin();

        $feedback = Feedback::factory()->create(['name' => 'User']);

        $feedbackCount = Feedback::count();

        $this->delete(route('dashboard.feedback.destroy', $feedback));

        $this->assertEquals(Feedback::count(), $feedbackCount - 1);
    }

    /** @test */
    public function itCanDisplayTrashedFeedback()
    {
        if (! $this->useSoftDeletes($model = Feedback::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Feedback::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.feedback.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayTrashedFeedbackDetails()
    {
        if (! $this->useSoftDeletes($model = Feedback::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $feedback = Feedback::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.feedback.trashed.show', $feedback));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanRestoreDeletedFeedback()
    {
        if (! $this->useSoftDeletes($model = Feedback::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $feedback = Feedback::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.feedback.restore', $feedback));

        $response->assertRedirect();

        $this->assertNull($feedback->refresh()->deleted_at);
    }

    /** @test */
    public function itCanForceDeleteFeedback()
    {
        if (! $this->useSoftDeletes($model = Feedback::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $feedback = Feedback::factory()->create(['deleted_at' => now()]);

        $feedbackCount = Feedback::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.feedback.forceDelete', $feedback));

        $response->assertRedirect();

        $this->assertEquals(Feedback::withoutTrashed()->count(), $feedbackCount - 1);
    }

    /** @test */
    public function itCanMarkTheSelectedFeedbackAsRead()
    {
        $this->actingAsAdmin();

        $feedback = Feedback::factory()->count(3)->create(['read_at' => null]);

        $feedback->each(function (Feedback $feedback) {
            $this->assertFalse($feedback->read());
        });

        $this->patch(route('dashboard.feedback.read'), [
            'items' => $feedback->pluck('id')->toArray(),
        ]);

        $feedback->each(function (Feedback $feedback) {
            $this->assertTrue($feedback->refresh()->read());
        });
    }

    /** @test */
    public function itCanMarkTheSelectedFeedbackAsUnread()
    {
        $this->actingAsAdmin();

        $feedback = Feedback::factory()->count(3)->create(['read_at' => now()]);

        $feedback->each(function (Feedback $feedback) {
            $this->assertTrue($feedback->read());
        });

        $this->patch(route('dashboard.feedback.unread'), [
            'items' => $feedback->pluck('id')->toArray(),
        ]);

        $feedback->each(function (Feedback $feedback) {
            $this->assertFalse($feedback->refresh()->read());
        });
    }
}
