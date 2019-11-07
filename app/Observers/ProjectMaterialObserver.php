<?php

namespace App\Observers;

use App\Entities\ProjectMaterial;

class ProjectMaterialObserver
{
    /**
     * Handle the project material "created" event.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return void
     */
    public function created(ProjectMaterial $projectMaterial)
    {
        // update total project
        $current_total = $projectMaterial->project->budget;
        $total = $current_total + ($projectMaterial->price * $projectMaterial->quantity);
        $projectMaterial->project->update(['budget' => $total]);

        // update quantity material
        $current_quantity = $projectMaterial->material->quantity;
        $quantity = $current_quantity - $projectMaterial->quantity;
        $projectMaterial->material->update(['quantity' => $quantity]);
    }

    /**
     * Handle the project material "updated" event.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return void
     */
    public function updated(ProjectMaterial $projectMaterial)
    {
        if($projectMaterial->isDirty('price') || $projectMaterial->isDirty('quantity')){
            // update total project
            $current_total = $projectMaterial->project->budget;
            $new = $projectMaterial->price * $projectMaterial->quantity;
            $old = $projectMaterial->getOriginal('price') * $projectMaterial->getOriginal('quantity');
            $total = $current_total + ($new - $old);
            $projectMaterial->project->update(['budget' => $total]);

            // update quantity material
            if($projectMaterial->isDirty('quantity')){
                $current_quantity = $projectMaterial->material->quantity;
                $new_quantity = $projectMaterial->quantity;
                $old_quantity = $projectMaterial->getOriginal('quantity');
                $quantity = $current_quantity - ($new_quantity - $old_quantity);
                $projectMaterial->material->update(['quantity' => $quantity]);
            }
        }
    }

    /**
     * Handle the project material "deleted" event.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return void
     */
    public function deleted(ProjectMaterial $projectMaterial)
    {
        $current_total = $projectMaterial->project->budget;
        $total = $current_total - ($projectMaterial->price * $projectMaterial->quantity);
        $projectMaterial->project->update(['budget' => $total]);
    }

    /**
     * Handle the project material "restored" event.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return void
     */
    public function restored(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Handle the project material "force deleted" event.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return void
     */
    public function forceDeleted(ProjectMaterial $projectMaterial)
    {
        //
    }
}
