<div>
    <form wire:submit.prevent="submitForm">
        <div id="comment" class="grid grid-rows-2 items-center">
            <div class="flex flex-col">
                <textarea class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee tablet:text-2xl minimal:text-lg font-base border-4 border-brownpaper focus:border-brownpaper focus:ring-0" type="text" name="content" wire:model="content" autocomplete="off" required></textarea>
            </div>

            <button type="submit" class="w-full py-2 desktop:text-2xl laptop:text-xl game:text-lg mobile:text-lg text-center flex justify-center items-center mx-auto bg-milano">
                <h1 id="buttonacc" class="font-pix text-oldpaper tablet:text-4xl minimal:text-2xl">
                    {{ __('оставить отзыв') }}
                </h1>
            </button>
        </div>
    </form>
</div>