@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-white">{{ __('Accessibility') }}</div>

                <div class="card-body appCardColor">

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="highContrast" id="highContrast">

                                <label class="form-check-label" for="highContrast">
                                    High contrast
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="voiceOver" id="voiceOver">

                                <label class="form-check-label" for="voiceOver">
                                    Voice over
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="invertColors" id="invertColors">

                                <label class="form-check-label" for="invertColors">
                                    Invert colors
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="largeText" id="largeText">

                                <label class="form-check-label" for="largeText">
                                    Large text
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="keyBoardNav" id="keyBoardNav">

                                <label class="form-check-label" for="keyBoardNav">
                                    Keyboard navigation
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border-color: black;" type="checkbox" name="largeBtns" id="largeBtns">

                                <label class="form-check-label" for="largeBtns">
                                    Large buttons
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" id="submit" class="btn btn-primary">
                                save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection